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
├── docs/
│   └── coding-rules.md   ← コーディングルール（ほぐしの森から流用）
├── scss/
│   ├── foundation/       ← 変数・関数・mixin・ベース
│   ├── components/       ← c-button / c-card / c-tag / c-section-title
│   ├── pages/            ← ページ固有スタイル
│   └── style.scss
├── css/
│   └── reset.css         ← kiso.css
└── js/
    └── main.js
```

---

## よく使うコマンド

```bash
npm run sass        # SCSSを監視コンパイル
npm run sass:build  # SCSSを1回コンパイル（圧縮）
```

---

## 参照ドキュメント

- コーディングルール → `docs/coding-rules.md`
