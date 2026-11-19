# ポートフォリオサイト

## 概要

| 項目     | 内容                                             |
| -------- | ------------------------------------------------ |
| サイト名 | KANZAKI Portfolio                                |
| 種別     | ポートフォリオ                                   |
| URL      | https://kanzaki-web.com/ （本番・WP版）。旧 kanzaki.site は休止 |
| Figma    | （デザイン制作後に記入）                         |

---

## 方針

- 現行のBootstrapテンプレート版をフルスクラッチでリニューアルする
- テンプレート不使用・自前のコーディングルールに基づく実装そのものを「作品」として見せる
- 作品カードは「担当範囲」1行まで（ラベルなし・ミュート小文字）。「工夫」は詳細ページが語る——一覧の仕事は見つけて選ばせること（制作期間は記載しない方針）
- 詳細な制作プロセスは各作品の詳細ページ（WPのカスタム投稿 works）へリンク（サマリーはカード側に書く）
- 静的HTML版（`index.html`・`works/*.html`・`css/style.css`）は 2026-11 に削除済み。サイトの実体は WPテーマ（`wp-theme/kanzaki/`）だけ。最後の状態は git タグ `static-final` にある

## 技術スタック

| 項目           | 内容                  |
| -------------- | --------------------- |
| フレームワーク | WordPressブロックテーマ（`wp-theme/kanzaki/`） |
| スタイリング   | SCSS                  |
| リセットCSS    | kiso.css（tak-dcxi）  |

---

## ディレクトリ構成

```
portfolio/
├── AGENTS.md
├── wp-theme/kanzaki/     ← WPブロックテーマ（サイトの実体。Localへはシンボリックリンク）
├── favicon.svg           ← 手書きSVGファビコン（テーマへコピーする元）
├── works/                ← 作品の実物サイト一式（本番 /demo/ の元。詳細ページはWP側）
├── docs/
│   └── coding-rules.md   ← コーディングルール（ほぐしの森から流用）
├── scss/
│   ├── foundation/       ← 変数（デザイントークン）・関数・mixin・ベース
│   ├── layout/           ← l-container / l-header / l-footer
│   ├── components/       ← c-button / c-card / c-tag / c-section-title
│   ├── pages/            ← ページ固有スタイル
│   ├── utilities/        ← u-sr-only 等（@layer 最終層）
│   └── style.scss        ← @layer 宣言と各層への読み込み（meta.load-css）
├── css/
│   └── reset.css         ← kiso.css（テーマの style.css に @layer reset として内包される）
├── images/               ← WebP最適化済み画像・ogp.png・apple-touch-icon.png（テーマ・WPメディアの元）
├── fonts/                ← Roboto可変フォント（テーマへコピーする元）
└── js/
    └── main.js           ← テーマへコピーする元
```

## 実装済みの技術要素（ルールと実装を一致させること）

- `@layer reset, foundation, layout, components, pages, utilities` によるカスケード管理
- カラートークンは `oklch()`（ライトテーマ固定。ダークモードは過剰と判断し廃止済み）
- 画像は WebP（`<picture>`）。OGP・favicon・canonical・JSON-LD 整備済み
- WordPressブロックテーマ版が `wp-theme/kanzaki/`（Localの portfolio-site で稼働。作品はCPT「works」）
- タイトルの折り返しは `word-break: keep-all`＋語境界ヒント方式（`inc/title-breaks.php` の the_title フィルタが表示時にゼロ幅スペースを挿入。DBは素のまま）。新作品でタイトルが語中で折れたら辞書に追記する

---

## よく使うコマンド

```bash
npm run wp:css:watch  # SCSSを監視コンパイル（テーマの assets/css/style.css へ）
npm run wp:css        # SCSSを1回コンパイル（圧縮）
npm run wp:build      # CSS＋JS・画像・フォントをテーマへ書き出し
```

---

## 参照ドキュメント

- コーディングルール → `docs/coding-rules.md`
