# コーディングルール

> このポートフォリオは「テンプレート不使用・自前ルールでの実装そのものを作品として見せる」方針。
> ルール自体が作品の一部であり、記述の正確さ・一貫性・モダンさがそのまま評価対象になる。
> 各章は **原則 → ルール → OK/NG例** の順で記述する。

---

## 1. 前提：リセットCSS（kiso.css）

`css/reset.css` は [tak-dcxi/kiso.css](https://github.com/tak-dcxi/kiso.css) を使用している。

- **破壊的リセットなし**：`margin: 0` / `padding: 0` の全消しはしない設計。ブラウザの有用なデフォルトは残っている
- **詳細度0**：`:where()` で囲まれているため、自分のスタイルで必ず上書きできる
- **日本語調整済み**：`line-break: strict` / `text-autospace` / `text-spacing-trim` 適用済み。追加不要
- **`focus-visible` 保持**：フォーカスリングはデフォルトで設定済み

---

## 2. クラス命名規則

### プレフィックス（必須）

| プレフィックス | 役割 | 例 |
|---|---|---|
| `l-` | Layout：ページ枠・共通コンテナ | `l-container`, `l-grid` |
| `c-` | Component：再利用できる汎用部品 | `c-button`, `c-card` |
| `p-` | Page：特定ページ固有のスタイル | `p-top-hero`, `p-about` |
| `u-` | Utility：微調整用 | `u-mt-16`, `u-sr-only` |

### BEM記法
- `block__element--modifier` 形式
- **孫要素（`__` が2回）は禁止**
- `c-` コンポーネントには外側余白（margin）を持たせない

---

## 3. カスケード設計（`@layer`）

**原則**：上書き順を“偶然の記述順”ではなく“意図”で固定する。kiso.css は `:where()`（詳細度0）なので、自前スタイルを層で管理すれば `u-` ユーティリティの優先を確実に保証できる。

`style.scss` の先頭でレイヤー順を宣言し、各 `@use` を対応レイヤーに割り当てる。

```scss
// style.scss
@layer reset, foundation, layout, components, pages, utilities;

@use "foundation"; // → @layer foundation
@use "components"; // → @layer components
// ...
```

- 後ろのレイヤーほど強い。`utilities` を最後に置き、`u-` で必ず微調整できる状態にする
- レイヤー内では従来どおり詳細度・記述順のルールが効く

---

## 4. 単位

- **px 禁止**。`rem($px)` 関数を使う（base = 16px、`rem(16)` → `1rem`）
  ```scss
  font-size: 16px;     // NG
  font-size: rem(16);  // OK
  ```
- **`line-height` は単位なしの数値のみ**
  ```scss
  line-height: 1.8;     // OK
  line-height: rem(28); // NG
  ```

---

## 5. 余白・スペーシング

**原則**：8pxシステムが決めるのは「余白のきざみ（リズム）」であって「量」ではない。
**たっぷりの余白と8pxグリッドは矛盾しない。** 大きいステップを選ぶことで、整然としたまま余白を効かせる。

### スケール（4px ベース・8px 基調）
- **8px を基調**とする（標準は 8 の倍数：8, 16, 24, 32, 48, 64…）
- **`4px` / `12px` も許容**。アイコンと文字の隙間、タグ内パディング、ボーダー分の微調整など「8では大きすぎる詰め」に使う**微調整ステップ**
- 禁止するのは 8px系から外れた半端値（**10 / 14 / 18px 等**）。許容する微調整は `--space-4` `--space-12` まで
- `_base.scss` のカスタムプロパティを優先して使う
  ```scss
  var(--space-4), var(--space-8), var(--space-12), var(--space-16) ... var(--space-160)
  var(--space-section) // セクション縦リズム clamp(64, 8vw, 120)
  ```

### 余白は3階層で使い分ける

| 階層 | 用途 | 使うトークン |
|---|---|---|
| 密 | コンポーネント内部（要素の塊を作る） | `--space-4` 〜 `--space-24` |
| 中 | 要素グループ間 | `--space-32` 〜 `--space-48` |
| 疎 | セクション間・レイアウト（塊を引き離す） | `--space-64` 以上 / `--space-section` |

> **セクション間に 16/24 を使わない。** 64・96・120（`--space-section`）を使い、余白でリズムと階層を作る。

### `gap` と `margin-top` の棲み分け
- **レイアウト（flex / grid）の間隔は `gap`**（margin相殺がなく、`c-` の外側余白禁止と相性が良い）
- **ドキュメント的な縦の流れは `margin-top`**
- **`margin-bottom` は使わない**
- `c-` クラスには外側余白（margin）を持たせない

```scss
// OK：レイアウトの間隔は gap
.l-grid {
  display: grid;
  gap: var(--space-32);
}
// OK：縦の流れは margin-top
.p-about__text { margin-top: var(--space-16); }
```

---

## 6. ブレークポイント（モバイルファースト）

`mq()` mixin を使う。実装済みは次の5段（`scss/foundation/_mixins.scss`）。

```scss
@include mq("sm")  { ... } // 576px以上
@include mq("md")  { ... } // 768px以上（SP→PC の基準）
@include mq("lg")  { ... } // 960px以上
@include mq("xl")  { ... } // 1280px以上
@include mq("xxl") { ... } // 1600px以上
```

---

## 7. ネスト

**原則**：ファイル内検索でクラス名がヒットするよう、検索性を優先する。
`&__element` / `&--modifier` のネストは禁止。フルクラス名で書く。

```scss
// NG：&で省略するとクラス名で検索できない
.c-card {
  &__title { font-size: rem(18); }
  &--featured { background: var(--color-bg-base); }
}

// OK：フルクラス名で書く
.c-card { padding: rem(16); }
.c-card__title { font-size: rem(18); }
.c-card--featured { background: var(--color-bg-base); }
```

ただし**疑似クラス・疑似要素・メディアクエリは同一ブロック内にネストしてよい**。

```scss
.c-card__title {
  font-size: rem(16);
  &:hover { opacity: var(--opacity-hover); }
  @include mq("md") { font-size: rem(18); }
}
```

### その他
- スタイルは**必ず SCSS**（`css/` に直接書かない）
- `@extend` 禁止
- `mixin` 禁止（`mq()` は除く）
- SCSSを書く前に `scss/foundation/_base.scss` を確認して変数を活用する

---

## 8. 論理プロパティ

**原則**：物理プロパティより論理プロパティを優先する（将来の縦書き・多言語にも耐える）。

- インライン軸は `margin-inline` / `padding-inline` / `inset-inline`（既に採用済み）
- ブロック軸の論理版は `margin-block-start` 等。本ルールの **`margin-top` は論理版では `margin-block-start`** にあたる（呼称は親しみやすさで `margin-top` を許容）

```scss
.l-container {
  max-width: rem(1080);
  margin-inline: auto;
  padding-inline: rem(20);
  @include mq("md") { padding-inline: rem(40); }
}
```

---

## 9. モダンCSS

### アスペクト比
padding-topハックは禁止。`aspect-ratio` を使う。
```scss
.c-thumbnail {
  aspect-ratio: 16 / 9;
  object-fit: cover;
}
```

### `:has()` — 親・兄弟の状態でスタイルを変える
JSでのクラス付け替えを減らせる場面では `:has()` を優先する。
```scss
.c-option:has(input:checked) { border-color: var(--color-accent); }
.c-card:has(.c-card__thumbnail) {
  display: grid;
  grid-template-columns: rem(120) 1fr;
}
```

### `clamp()` — fluid typography
ブレークポイントごとの font-size 切り替えが増える場合は `clamp()` でなめらかに可変させてよい。
```scss
font-size: clamp(rem(24), 1.2rem + 1.5vw, rem(40)); // clamp(最小, 推奨, 最大)
```
- デザイントークン（`--text-*`）で足りる場合はトークンを優先
- FVヒーローや装飾テキストなど、SP/PCでサイズ差が大きい箇所に有効

### `text-wrap` — 行折りの最適化
```scss
.c-section-title { text-wrap: balance; } // 見出し：各行の長さを均す
.p-about__lead   { text-wrap: pretty; }  // 本文：最終行の孤立語（オーファン）を防ぐ
```

### container queries — コンポーネントを置かれた幅で可変
**原則**：ページ全体のレイアウトは `mq()`（ビューポート基準）、**再利用コンポーネントは `@container`**（置かれた枠の幅基準）。
```scss
.c-card { container-type: inline-size; }

@container (min-width: 30rem) {
  .c-card__body { display: grid; grid-template-columns: rem(120) 1fr; }
}
```

### subgrid — カード内部の行を揃える
**原則**：均一なカード並びで、タイトル／メタ／タグの**高さを行ごとに一直線に揃えたい**場合に使う。
内部要素を親グリッドの行に乗せる（flex では揃わない）。
```scss
.l-cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-32); }
.l-cards > .c-card {
  display: grid;
  grid-row: span 4;            // タイトル/タグ/説明/メタ の4行
  grid-template-rows: subgrid;
}
```
- ⚠️ **`c-` の独立性に注意**：横並び（featured）など別レイアウトでも使う部品や、内容数が可変（バッジ任意等）なカードには無理に適用しない。**内部構造が揃っている一覧専用**に限る。

---

## 10. モーション設計

### 原則（Material Motion 準拠）
- **目的を持つ動き** — 何かが起きたことを伝える、視線を誘導する
- **再レイアウトしないプロパティのみ** — `transform` / `opacity` / `filter`
- `prefers-reduced-motion` を**必ずセット**で書く

```scss
.c-button {
  transition: opacity 0.2s var(--ease-standard);
  @media (prefers-reduced-motion: reduce) { transition: none; }
}
```

### イージング（`_base.scss` のトークン）
```scss
var(--ease-standard)    // cubic-bezier(0.2, 0, 0, 1)  標準
var(--ease-decelerate)  // cubic-bezier(0, 0, 0, 1)    画面内に入ってくる
```

### デュレーション目安
| 動き | 時間 |
|------|------|
| マイクロ（ホバー・トグル） | 100–200ms |
| 標準（パネル展開・モーダル） | 200–400ms |
| 大きな遷移（ページ切替） | 400–600ms |

---

## 11. フォーカス

kiso.cssのデフォルトを活かしつつ、カスタムする場合は `:focus-visible` を使う。
```scss
.c-button {
  &:focus { outline: none; }
  &:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
  }
}
```

---

## 12. タイポグラフィスケール

### fluid typography（`_base.scss` の `--text-*`）
```scss
--text-xs:   clamp(0.75rem, 0.7rem + 0.25vw, 0.875rem);  /* 12–14px */
--text-sm:   clamp(0.875rem, 0.8rem + 0.375vw, 1rem);    /* 14–16px */
--text-base: clamp(1rem, 0.95rem + 0.25vw, 1.125rem);    /* 16–18px */
--text-lg:   clamp(1.125rem, 1rem + 0.625vw, 1.375rem);  /* 18–22px */
--text-xl:   clamp(1.25rem, 1.1rem + 0.75vw, 1.75rem);   /* 20–28px */
--text-2xl:  clamp(1.5rem, 1.2rem + 1.5vw, 2.5rem);      /* 24–40px */
--text-3xl:  clamp(2rem, 1.5rem + 2.5vw, 3.5rem);        /* 32–56px */
```

### 行間・字間
```scss
// 日本語本文（body で適用済み）
line-height: 1.8;        // 最低1.7
letter-spacing: 0.05em;
// 日本語見出し
line-height: 1.3;
letter-spacing: 0.02em;
```

---

## 13. HTMLルール

### セマンティックHTML
| 要素 | 使う場面 |
|---|---|
| `<header>` | サイトヘッダー・セクションヘッダー |
| `<nav>` | ナビゲーション |
| `<main>` | メインコンテンツ（1ページ1つ） |
| `<article>` | 独立したコンテンツ（記事・カード） |
| `<section>` | 見出しを持つコンテンツのまとまり |
| `<aside>` | サイドバー・補足情報 |
| `<button>` | クリックアクション（`<a>` と混同しない） |

### 画像
```html
<picture>
  <source srcset="image.avif" type="image/avif">
  <source srcset="image.webp" type="image/webp">
  <img src="image.jpg" alt="説明" width="800" height="600" loading="lazy">
</picture>
```
- `width` / `height` 属性を**必ず**書く（CLS対策）
- `alt` テキストを必ず書く（装飾のみ `alt=""`）
- ファーストビュー以外は `loading="lazy"`

### アクセシビリティ
```scss
.u-sr-only { // スクリーンリーダー向け非表示テキスト
  position: absolute;
  width: 1px; height: 1px;
  padding: 0; margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}
```
```html
<button aria-label="メニューを開く">
  <svg aria-hidden="true">...</svg>
</button>
```

---

## 14. パフォーマンス（Core Web Vitals）

### LCP（最大コンテンツの描画）— 目標 2.5秒以内
```html
<img src="hero.webp" alt="..." fetchpriority="high" width="1200" height="600">
<link rel="preload" href="font.woff2" as="font" type="font/woff2" crossorigin>
```

### CLS（レイアウトシフト）— 目標 0.1以下
- 全画像に `width` / `height` 属性（省略禁止）
- フォントは `font-display: swap`

### INP（インタラクション応答）— 目標 200ms以内
- イベントハンドラーは軽く保つ（DOM操作は最小限）
- アニメーションは `transform` / `opacity` のみ（`width` / `height` は再レイアウト発生）

### レンダリング最適化
- **`scrollbar-gutter: stable`**（`html`）：スクロールバー出現時の横方向CLSを防ぐ（採用済み）
- **`content-visibility: auto`**：1ページ縦長構成で画面外セクションの描画をスキップ
  ```scss
  .p-section { content-visibility: auto; contain-intrinsic-size: auto rem(600); }
  ```
  ⚠️ **アンカーナビ（`#id`）＋ `scroll-behavior: smooth` と併用すると初回の着地ズレが起きうる**。
  導入時は実機（特にディープリンク・Ctrl+F）で必ず確認する。

---

## 15. カラーの記法・ダークモード

### カラーの記法（`oklch()`）
新規・差し替え時のカラートークンは `oklch()` で定義する（知覚的に均一・明度調整が直感的・`color-mix()` 派生が安定）。
```scss
--color-accent: oklch(0.52 0.23 264); /* ≒ #2456f0 */
```
> 現行の `_base.scss` は Figma 確定後に差し替える仮HEX。差し替えのタイミングで oklch 化する。

### ダークモード

### CSS変数でテーマ切り替え
```scss
:root {
  color-scheme: light dark;
  --color-bg:   light-dark(#ffffff, #111827);
  --color-text: light-dark(#1a1a1a, #f9fafb);
}
// 手動切替もサポートする場合
[data-theme="dark"] { color-scheme: dark; }
```
- 二重定義は `light-dark()` で簡潔化できる
- ボーダー・ホバーの濃淡は `color-mix()` で本体色から派生させる
  ```scss
  border-color: color-mix(in srgb, var(--color-main) 12%, transparent);
  ```

### 画像のダークモード対応
```html
<picture>
  <source srcset="image-dark.webp" media="(prefers-color-scheme: dark)">
  <img src="image.webp" alt="...">
</picture>
```

---

## 16. JavaScriptルール

- `const` / `let` を使う（`var` 禁止）
- DOM操作は `querySelector` / `querySelectorAll`
- イベントは `addEventListener`（`onclick` 属性禁止）
- 非同期は `async/await`
- `console.log` はコミット前に削除

---

## 17. 禁止事項一覧

| 禁止 | 代替 |
|---|---|
| px 指定 | `rem($px)` |
| 8px系から外れた半端値（10/14/18） | 8基調 + 4/12 の微調整ステップ |
| `margin-bottom` | `margin-top`（縦の流れ）/ `gap`（レイアウト） |
| `clearfix` / `float` | flex / grid |
| `@extend` | プロパティを直接記述 |
| mixin（`mq` 除く） | プロパティを直接記述 |
| `style` 属性直書き | クラスに切り出す |
| `var`（JS） | `const` / `let` |
| padding-top ハック | `aspect-ratio` |
| `:focus` のみリセット | `:focus-visible` を活用 |
| アニメーション単独記述 | `prefers-reduced-motion` とセット |

---

## 18. 完了チェックリスト

**スペーシング**
- [ ] 余白は 8基調 + 4/12 の微調整のみ（10/14/18 等の半端値なし）
- [ ] セクション間は 64+ / `--space-section`（16/24 で詰めていない）
- [ ] レイアウト間隔は `gap`、縦の流れは `margin-top`（`margin-bottom` なし）

**パフォーマンス**
- [ ] FV画像に `fetchpriority="high"`
- [ ] 全画像に `width` / `height` 属性、FV以外は `loading="lazy"`
- [ ] アニメーションは `transform` / `opacity` のみ

**アクセシビリティ**
- [ ] 見出し階層が正しい（h1→h2→h3）
- [ ] アイコンのみボタンに `aria-label`
- [ ] フォーカスリングが見える（`:focus-visible`）
- [ ] `prefers-reduced-motion` 対応済み

**コーディング**
- [ ] px直書きなし（`rem()` 使用）
- [ ] ハードコードなし（CSS変数を使用）
- [ ] BEM命名に `__` が2回以上ない
- [ ] 576 / 768 / 960 / 1280px で確認済み
