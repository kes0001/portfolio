#!/usr/bin/env python3
"""静的 works/*.html + index.html から WP 移行データを生成する。

出力:
  content-<slug>.html … post_content（wp:html ブロック1つに本文セクションを格納）
  import.sh          … Local の Open Site Shell で実行する wp-cli スクリプト

再実行可能（出力は毎回上書き）。
"""
import re
import pathlib

ROOT = pathlib.Path(__file__).resolve().parents[2]  # portfolio/
OUT = pathlib.Path(__file__).resolve().parent
THEME_IMG = "/wp-content/themes/kanzaki/assets/images"


def zen(text):
    return re.sub(r"\s+", " ", text).strip()


def group_block(class_name, inner_blocks):
    """core/group ブロックを生成する（layout: default = 余白CSSなしのプレーンdiv）"""
    return (
        f'<!-- wp:group {{"className":"{class_name}","layout":{{"type":"default"}}}} -->\n'
        f'<div class="wp-block-group {class_name}">\n{inner_blocks}\n</div>\n'
        "<!-- /wp:group -->"
    )


def paragraph_block(class_name, text):
    if class_name:
        return (
            f'<!-- wp:paragraph {{"className":"{class_name}"}} -->\n'
            f'<p class="{class_name}">{text}</p>\n'
            "<!-- /wp:paragraph -->"
        )
    return f"<!-- wp:paragraph -->\n<p>{text}</p>\n<!-- /wp:paragraph -->"


def extract_balanced_div(src, start):
    """src[start:] が <div ...> で始まる前提で、対応する </div> までを返す"""
    depth = 0
    for m in re.finditer(r"<div\b|</div>", src[start:]):
        depth += 1 if m.group(0) != "</div>" else -1
        if depth == 0:
            end = start + m.end()
            return src[start:end], end
    raise ValueError("unbalanced div")


def convert_figure(fig_html):
    """figure（picture+img または素のimg、任意のfigcaption）→ core/image

    画像ファイルは2x書き出しのため、静的版と同じく width/height 属性で
    表示サイズを制約する（属性なしだと原寸で表示され拡大されてしまう）。
    """
    # picture がある場合は webp ソースを採用（表示は同一・単一ソースに集約）
    source = re.search(r'<source srcset="([^"]+)"', fig_html)
    img = re.search(r'<img src="([^"]+)" alt="([^"]*)"', fig_html)
    src = source.group(1) if source else img.group(1)
    alt = img.group(2)
    size = re.search(r'width="(\d+)" height="(\d+)"', fig_html)
    attrs = '"className":"p-work__variation-fig"'
    size_attrs = ""
    if size:
        attrs = f'"width":{size.group(1)},"height":{size.group(2)},' + attrs
        size_attrs = f' width="{size.group(1)}" height="{size.group(2)}"'
    cap = re.search(r'<figcaption class="p-work__variation-fig-cap">(.*?)</figcaption>', fig_html, re.S)
    caption = f'<figcaption class="wp-element-caption">{zen(cap.group(1))}</figcaption>' if cap else ""
    return (
        f"<!-- wp:image {{{attrs}}} -->\n"
        f'<figure class="wp-block-image p-work__variation-fig"><img src="{src}" alt="{alt}"{size_attrs}/>{caption}</figure>\n'
        "<!-- /wp:image -->"
    )


def convert_variations(html):
    """div.p-work__variations → group（各案 = group > ラベルp + 画像group > core/image + 本文p）"""
    variations = []
    pos = 0
    while True:
        m = re.compile(r'<div class="p-work__variation">').search(html, pos)
        if not m:
            break
        var_html, pos = extract_balanced_div(html, m.start())
        parts = []
        label = re.search(r'<p class="p-work__variation-label">(.*?)</p>', var_html, re.S)
        if label:
            parts.append(paragraph_block("p-work__variation-label", zen(label.group(1))))
        images = re.search(r'<div class="(p-work__variation-images[^"]*)">', var_html)
        if images:
            images_html, _ = extract_balanced_div(var_html, images.start())
            figs = [
                convert_figure(f)
                for f in re.findall(r"<figure.*?</figure>", images_html, re.S)
            ]
            parts.append(group_block(images.group(1), "\n".join(figs)))
        for text in re.findall(r'<p class="p-work__variation-text">(.*?)</p>', var_html, re.S):
            parts.append(paragraph_block("p-work__variation-text", zen(text)))
        variations.append(group_block("p-work__variation", "\n".join(parts)))
    return group_block("p-work__variations", "\n".join(variations))


def convert_spec(dl_html):
    """dl.p-work__spec → group（行 = 素group > 用語p + 説明p。dlに相当するブロックがないため）"""
    rows = []
    for dt, dd in re.findall(r"<div><dt>(.*?)</dt><dd>(.*?)</dd></div>", dl_html, re.S):
        row = (
            paragraph_block("p-work__spec-term", zen(dt))
            + "\n"
            + paragraph_block("p-work__spec-desc", zen(dd))
        )
        rows.append(
            '<!-- wp:group {"layout":{"type":"default"}} -->\n'
            f'<div class="wp-block-group">\n{row}\n</div>\n'
            "<!-- /wp:group -->"
        )
    return group_block("p-work__spec", "\n".join(rows))


def convert_cases(html):
    """div.p-work__cases → group（各カード = group > ラベルp + 本文p）"""
    cases = []
    for label, text in re.findall(
        r'<div class="p-work__case">\s*<p class="p-work__case-label">(.*?)</p>\s*'
        r'<p class="p-work__case-text">(.*?)</p>\s*</div>',
        html,
        re.S,
    ):
        inner = (
            paragraph_block("p-work__case-label", zen(label))
            + "\n"
            + paragraph_block("p-work__case-text", zen(text))
        )
        cases.append(group_block("p-work__case", inner))
    return group_block("p-work__cases", "\n".join(cases))


def convert_section_to_blocks(section_html):
    """セクションを標準ブロックへ変換する（画像・スペック表・ペルソナカード含め全て）"""
    inner = re.search(r'<section class="p-work__section">(.*)</section>', section_html, re.S)
    if not inner:
        return None
    src = inner.group(1)
    parts = []
    token = re.compile(
        r'<h2 class="p-work__section-title">'
        r'(?:<span class="p-work__section-title-en">(?P<en>[^<]*)</span>)?(?P<jp>[^<]+)</h2>'
        r"|<p class=\"p-work__text\">(?P<text>.*?)</p>"
        r"|<ul class=\"p-work__list\">(?P<list>.*?)</ul>"
        r"|<dl class=\"p-work__spec\">(?P<spec>.*?)</dl>"
        r"|(?P<variations><div class=\"p-work__variations\">)"
        r"|(?P<cases><div class=\"p-work__cases\">)",
        re.S,
    )
    pos = 0
    while True:
        m = token.search(src, pos)
        if not m:
            break
        pos = m.end()
        if m.group("jp"):
            if m.group("en"):
                parts.append(
                    paragraph_block("p-work__section-title-en", m.group("en").strip())
                )
            parts.append(
                '<!-- wp:heading {"className":"p-work__section-title"} -->\n'
                f'<h2 class="wp-block-heading p-work__section-title">{m.group("jp").strip()}</h2>\n'
                "<!-- /wp:heading -->"
            )
        elif m.group("text") is not None:
            parts.append(paragraph_block("p-work__text", zen(m.group("text"))))
        elif m.group("list") is not None:
            items = re.findall(r"<li>(.*?)</li>", m.group("list"), re.S)
            li_blocks = "\n".join(
                f"<!-- wp:list-item -->\n<li>{zen(i)}</li>\n<!-- /wp:list-item -->" for i in items
            )
            parts.append(
                '<!-- wp:list {"className":"p-work__list"} -->\n'
                f'<ul class="wp-block-list p-work__list">\n{li_blocks}\n</ul>\n'
                "<!-- /wp:list -->"
            )
        elif m.group("spec") is not None:
            parts.append(convert_spec(m.group("spec")))
        elif m.group("variations") is not None:
            block_html, pos = extract_balanced_div(src, m.start())
            parts.append(convert_variations(block_html))
        elif m.group("cases") is not None:
            block_html, pos = extract_balanced_div(src, m.start())
            parts.append(convert_cases(block_html))
    if not parts:
        return None
    inner_blocks = "\n\n".join(parts)
    return group_block("p-work__section", inner_blocks)


def convert_to_blocks(body):
    """本文をセクション単位で標準ブロック化する（wp:html は使わない）"""
    sections = re.findall(r'<section class="p-work__section">.*?</section>', body, re.S)
    if not sections:
        return f"<!-- wp:html -->\n{body}\n<!-- /wp:html -->"
    blocks = []
    for sec in sections:
        converted = convert_section_to_blocks(sec)
        if converted:
            blocks.append(converted)
        else:
            blocks.append(f"<!-- wp:html -->\n{sec}\n<!-- /wp:html -->")
    return "\n\n".join(blocks)


def parse_cards():
    """index.html のカードから 掲載順・カード用メタを取得"""
    html = (ROOT / "index.html").read_text(encoding="utf-8")
    cards = []
    for m in re.finditer(
        r'<a class="c-card" href="\./works/([a-z0-9-]+)\.html">(.*?)</a>\s*</li>',
        html,
        re.S,
    ):
        slug, body = m.group(1), m.group(2)
        badge = re.search(r'c-card__badge">([^<]+)<', body)
        cat = re.search(r'c-card__category">([^<]+)<', body)
        title = re.search(r'c-card__title">([^<]+)(?:<span class="c-card__title-note">([^<]+)</span>)?</h3>', body)
        values = re.findall(r'c-card__meta-value">([^<]+)<', body)
        thumb = re.search(r'img class="c-card__thumbnail" src="\./(images/[^"]+)"', body)
        cards.append(
            dict(
                slug=slug,
                badge=zen(badge.group(1)) if badge else "",
                category=zen(cat.group(1)).upper() if cat else "",
                title=zen(title.group(1)) if title else slug,
                subtitle=zen(title.group(2)) if title and title.group(2) else "",
                role=zen(values[0]) if len(values) > 0 else "",
                highlight=zen(values[1]) if len(values) > 1 else "",
                thumb=str(ROOT / thumb.group(1)) if thumb else "",
            )
        )
    return cards


def parse_detail(slug):
    html = (ROOT / "works" / f"{slug}.html").read_text(encoding="utf-8")
    eyebrow = re.search(r'p-work__eyebrow">([^<]+)<', html)
    lead = re.search(r'p-work__lead">([^<]+)<', html)
    tools_values = re.findall(r'p-work__meta-value">([^<]+)<', html)
    site = re.search(r'p-work__actions">\s*<a class="c-button[^"]*" href="([^"]+)"', html)

    # 本文: p-work__body の中身（末尾の閉じdivを除去）
    m = re.search(r'<div class="p-work__body">\n(.*?)\n\s*</div>\n\s*<div class="p-work__cta">', html, re.S)
    body = m.group(1) if m else ""
    # 画像・リンクのパスをWP用に書き換え
    body = body.replace("../images/", f"{THEME_IMG}/")
    body = re.sub(r'href="\./([a-z0-9-]+)/', r'href="/demo/\1/', body)
    # インデントを浅く整える
    body = re.sub(r"^ {10}", "", body, flags=re.M)
    body = convert_to_blocks(body)

    site_url = ""
    if site:
        u = site.group(1)
        site_url = re.sub(r"^\./", "/demo/", u) if u.startswith("./") else u

    return dict(
        eyebrow=zen(eyebrow.group(1)) if eyebrow else "",
        lead=zen(lead.group(1)) if lead else "",
        tools=zen(tools_values[1]) if len(tools_values) > 1 else "",
        site_url=site_url,
        body=body,
    )


def main():
    cards = parse_cards()
    lines = [
        "#!/bin/bash",
        "# Local の「Open Site Shell」でリポジトリ直下から実行:",
        '#   bash "<repo>/wp-theme/migration/import.sh"',
        "# 再実行時は同スラッグの既存投稿を削除してから作成する。",
        "set -euo pipefail",
        f'MIG_DIR="$(cd "$(dirname "$0")" && pwd)"',
        "",
    ]
    for i, card in enumerate(cards, start=1):
        detail = parse_detail(card["slug"])
        content_file = OUT / f"content-{card['slug']}.html"
        content_file.write_text(detail["body"] + "\n", encoding="utf-8")

        def sh(s):
            return "'" + s.replace("'", "'\\''") + "'"

        date = f"2026-01-{i:02d} 10:00:00"  # menu_order と date 順を一致させ前後ナビを掲載順にする
        lines += [
            f"# ---- {i:02d}: {card['title']} ----",
            f"EXISTING=$(wp post list --post_type=works --name={card['slug']} --format=ids)",
            'if [ -n "$EXISTING" ]; then wp post delete $EXISTING --force; fi',
            f'ID=$(wp post create "$MIG_DIR/content-{card["slug"]}.html" --post_type=works --post_status=publish \\',
            f"  --post_title={sh(card['title'])} --post_name={card['slug']} --menu_order={i} \\",
            f"  --post_date={sh(date)} --post_excerpt={sh(detail['lead'])} --porcelain)",
            f"wp post meta update $ID kanzaki_subtitle {sh(card['subtitle'])}",
            f"wp post meta update $ID kanzaki_eyebrow {sh(detail['eyebrow'])}",
            f"wp post meta update $ID kanzaki_category {sh(card['category'])}",
            f"wp post meta update $ID kanzaki_role {sh(card['role'])}",
            f"wp post meta update $ID kanzaki_tools {sh(detail['tools'])}",
            f"wp post meta update $ID kanzaki_highlight {sh(card['highlight'])}",
            f"wp post meta update $ID kanzaki_site_url {sh(detail['site_url'])}",
            f"wp post meta update $ID kanzaki_badge {sh(card['badge'])}",
        ]
        if card["thumb"]:
            lines.append(f'wp media import {sh(card["thumb"])} --post_id=$ID --featured_image --title={sh(card["title"])}')
        lines.append(f'echo "imported: {card["slug"]} (ID=$ID)"')
        lines.append("")

    (OUT / "import.sh").write_text("\n".join(lines) + "\n", encoding="utf-8")
    print(f"{len(cards)} 作品分を生成:")
    for c in cards:
        print(f"  {c['slug']:15s} {c['title']}")


if __name__ == "__main__":
    main()
