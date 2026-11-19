<?php
/**
 * Title: このサイトについて
 * Slug: kanzaki/about-site
 * Categories: kanzaki
 * Inserter: no
 *
 * 全体を標準ブロックで構成。タグは RichText が span クラスを保持できないため
 * c-tag クラス付きの段落として並べる（.p-top-note__stack-list が flex で整列）。
 * 見出しの id（anchor）は静的版の aria-labelledby と揃えるため維持。
 *
 * @package kanzaki
 */

$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"p-top-section p-top-section--alt js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section p-top-section--alt js-reveal">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">About</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"anchor":"about-site-title","className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp" id="about-site-title">このサイトについて</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-section__body p-top-note__inner","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body p-top-note__inner">

<!-- wp:group {"className":"p-top-note__body","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-note__body">
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">本サイトはテンプレートを使わず、自分で決めたコーディングルール（BEM設計・デザイントークン・SCSSのコンポーネント分割）に沿って、設計から実装まで制作しました。デザインはFigmaで組み、WordPressのオリジナルブロックテーマとして実装しています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">実装にはAI（Claude Code）を使っています。コードの多くはAIと一緒に書いたものです。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">何をどう作るかの判断と、品質の最終確認は自分で行いました。@layer によるカスケード管理、oklch() のカラートークン、WebPでの画像最適化も、このサイトで実際に使っています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">公開後の運用も自分で行っています。レンタルサーバーへの公開、GA4・Google Search Console の導入、PageSpeed Insights での表示速度改善（デスクトップ全項目100点）まで、このサイトで実践しました。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-note__stack","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-note__stack">
<!-- wp:heading {"level":3,"className":"p-top-note__stack-title"} -->
<h3 class="wp-block-heading p-top-note__stack-title">使用技術</h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"p-top-note__stack-list","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-note__stack-list">
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">HTML</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">SCSS</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">JavaScript</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">WordPress</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">ブロックテーマ</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">BEM</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">@layer</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">oklch()</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">WebP</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">Figma</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">Claude Code</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">GA4</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-tag"} -->
<p class="c-tag">Search Console</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:html -->
<p class="p-top-note__source"><a class="c-button c-button--secondary" href="https://github.com/kes0001/portfolio" target="_blank" rel="noopener"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#arrow-up-right-from-square"></use></svg>ソースコードを見る（GitHub）</a></p>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
