# KANZAKI Portfolio

Webデザイナー・コーダー 神﨑勝弘のポートフォリオサイトのソースです。
テンプレートを使わず、自分で決めたコーディングルールに沿ってフルスクラッチで作っています。

- サイト：https://kanzaki-web.com/
- コーディングルール：[docs/coding-rules.md](docs/coding-rules.md)

## 見どころ

- **CSS設計**：SCSS＋FLOCSS命名。`@layer reset, foundation, layout, components, pages, utilities` で読み込み順を管理
- **デザイントークン**：色は `oklch()`、余白・文字サイズは変数で定義し、デザインと実装で同じ値を使う
- **WordPressブロックテーマを自作**：`wp-theme/kanzaki/`。作品はカスタム投稿タイプ＋ACF、静的版とSCSSを共有
- **ライブラリなしの演出**：スクロール連動（`animation-timeline`）と View Transitions。すべて `prefers-reduced-motion` で止まる
- **日本語の組版**：見出しの語中折れを防ぐ `word-break: keep-all`＋語境界ヒント
- **画像・SEO**：WebP（`<picture>`／`srcset`）、OGP・JSON-LD・canonical を整備

## ブランチ

| ブランチ | 内容 |
| --- | --- |
| `main` | 公開中のサイト（制作のご依頼向け） |
| `career` | 転職用に改修中の版 |

## ディレクトリ

```
index.html / works/*.html   静的版のページ（works/ の下に各作品の実物サイト）
scss/                       foundation / layout / components / pages / utilities
css/style.css               コンパイル済みCSS
wp-theme/kanzaki/           WordPressブロックテーマ
docs/                       コーディングルール・デザインルール
```

## ビルド

```bash
npm install
npm run sass        # SCSSを監視コンパイル
npm run sass:build  # 静的版のCSSを書き出し
npm run wp:css      # WPテーマのCSSを書き出し
```
