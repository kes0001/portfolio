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

WordPress化する前に作った静的HTML版（`index.html` と `works/*.html`）は、2026年11月に更新を止め、リポジトリから削除しました。最後の状態は git タグ `static-final` で見られます。公開中のサイトは WordPress テーマ（`wp-theme/kanzaki/`）です。

## ディレクトリ

```
wp-theme/kanzaki/           WordPressブロックテーマ（公開中のサイト）
scss/                       foundation / layout / components / pages / utilities（テーマのCSSの元）
works/                      各作品の実物サイト
docs/                       コーディングルール・デザインルール
```

## ビルド

```bash
npm install
npm run wp:css:watch  # SCSSを監視コンパイル（WPテーマ向け）
npm run wp:css        # WPテーマのCSSを書き出し
```
