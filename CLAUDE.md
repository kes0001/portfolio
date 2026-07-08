# ポートフォリオサイト

## 概要

| 項目     | 内容                                             |
| -------- | ------------------------------------------------ |
| サイト名 | KANZAKI Portfolio                                |
| 種別     | ポートフォリオ                                   |
| URL      | https://www.kanzaki.site/ （現行版・リニューアル対象） |
| Figma    | （デザイン制作後に記入）                         |

---

## 方針

- 現行のBootstrapテンプレート版をフルスクラッチでリニューアルする
- テンプレート不使用・自前のコーディングルールに基づく実装そのものを「作品」として見せる
- 作品カードには「担当範囲・工夫」の2点セットを必ず載せる（制作期間は記載しない方針）
- 詳細な制作プロセスは各作品の詳細ページ（`works/*.html`）へリンク（サマリーはカード側に書く）

## 技術スタック

| 項目           | 内容                  |
| -------------- | --------------------- |
| フレームワーク | HTML+CSS（静的）      |
| スタイリング   | SCSS                  |
| リセットCSS    | kiso.css（tak-dcxi）  |

---

## ディレクトリ構成

```
portfolio/
├── CLAUDE.md
├── index.html
├── favicon.svg           ← 手書きSVGファビコン
├── works/                ← 作品詳細ページ（*.html）と実物サイト一式
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
│   └── reset.css         ← kiso.css（style.css に @layer reset として内包される）
├── images/               ← WebP最適化済み画像・ogp.png・apple-touch-icon.png
└── js/
    └── main.js
```

## 実装済みの技術要素（ルールと実装を一致させること）

- `@layer reset, foundation, layout, components, pages, utilities` によるカスケード管理
- カラートークンは `oklch()`（ライトテーマ固定。ダークモードは過剰と判断し廃止済み）
- 画像は WebP（`<picture>`）。OGP・favicon・canonical・JSON-LD 整備済み
- WordPressブロックテーマ版が `wp-theme/kanzaki/`（Localの portfolio-site で稼働。作品はCPT「works」）

---

## よく使うコマンド

```bash
npm run sass        # SCSSを監視コンパイル
npm run sass:build  # SCSSを1回コンパイル（圧縮）
```

---

## 参照ドキュメント

- コーディングルール → `docs/coding-rules.md`
