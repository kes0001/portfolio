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

?>
<!-- wp:group {"tagName":"section","className":"p-top-section js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section js-reveal">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">About This Site</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"anchor":"about-site-title","className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp" id="about-site-title">このサイトについて</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-section__body p-top-note__inner","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body p-top-note__inner">

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">本サイトはテンプレートを使わず、自分で整備したコーディングルール（BEM設計・デザイントークン・SCSSのコンポーネント分割）に基づいて、設計から実装まで一貫して制作しました。デザインはFigmaで組み、フロントエンドはWordPressのオリジナルブロックテーマとして実装しています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">この制作では、AI（Claude Code）を実装のパートナーとして本格的に活用しました。コードの多くはAIとの協働から生まれたもので、その事実を隠すつもりはありません。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">一方で、何をどう作るかという設計判断と、品質の最終責任は自分が握り続けました。AIを「手を動かす道具」として使いこなし、@layer によるカスケード管理、oklch() によるカラートークン設計、WebPによる画像最適化といったモダンな手法を、迷いなくこのサイト自身で実践しています。AIを使いこなす力もまた、これからの制作者に必要なスキルだと考え、「どう作るか」という判断そのものを作品の一部としてご覧いただけるようにしました。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">公開後の運用も自分の手で行っています。レンタルサーバーへの公開から、GA4・Google Search Console の導入とサイトマップ送信、PageSpeed Insights を用いたパフォーマンス改善（デスクトップ全項目100点）まで、「作って終わり」ではなく「届けて計測する」ところまでを本サイトで実践しています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-note__stack","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-note__stack">
<!-- wp:heading {"level":3,"className":"p-top-note__stack-title"} -->
<h3 class="wp-block-heading p-top-note__stack-title">Built With</h3>
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
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
