# KANZAKI Portfolio

Webデザイナー・コーダー 神﨑勝弘のポートフォリオサイトのソースです。
テンプレートを使わず、自分で決めたコーディングルールに沿ってフルスクラッチで作っています。

- サイト：https://kanzaki-web.com/
- コーディングルール：[docs/coding-rules.md](docs/coding-rules.md)

## 見どころ

- **CSS設計**：SCSS＋FLOCSS命名。`@layer reset, foundation, layout, components, pages, utilities` で読み込み順を管理
- **デザイントークン**：色は `oklch()`、余白・文字サイズは変数で定義し、デザインと実装で同じ値を使う
- **WordPressブロックテーマを自作**：`wp-theme/kanzaki/`。作品はカスタム投稿タイプ＋ACF
- **ライブラリなしの演出**：スクロール連動（`animation-timeline`）と View Transitions。すべて `prefers-reduced-motion` で止まる
- **日本語の組版**：見出しの語中折れを防ぐ `word-break: keep-all`＋語境界ヒント
- **画像・SEO**：WebP（`<picture>`／`srcset`）、OGP・JSON-LD・canonical を整備

## ブランチ

| ブランチ | 内容 |
| --- | --- |
| `career` | 公開中のサイト（転職用に改修した最新版） |
| `main` | 制作のご依頼向けだった頃の版 |

## 静的版について

`index.html` と `works/*.html` は、WordPress化する前に作った静的HTML版です。コードの見本として残しており、**2026年11月で更新を止めました**。最新の内容は WordPress テーマ（`wp-theme/kanzaki/`）にあります。

## ディレクトリ

```
wp-theme/kanzaki/           WordPressブロックテーマ（公開中のサイト）
index.html / works/*.html   静的HTML版（更新停止。works/ の下に各作品の実物サイト）
scss/                       foundation / layout / components / pages / utilities
css/style.css               静的版のコンパイル済みCSS
docs/                       コーディングルール・デザインルール
```

## ビルド

```bash
npm install
npm run wp:css:watch  # SCSSを監視コンパイル（WPテーマ向け）
npm run wp:css        # WPテーマのCSSを書き出し
```
