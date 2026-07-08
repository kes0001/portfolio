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
        content_file.write_text(
            "<!-- wp:html -->\n" + detail["body"] + "\n<!-- /wp:html -->\n",
            encoding="utf-8",
        )

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
