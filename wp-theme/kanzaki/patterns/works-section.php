<?php
/**
 * Title: 作品一覧（Query Loop）
 * Slug: kanzaki/works-section
 * Categories: kanzaki
 * Inserter: no
 *
 * works CPT を menu_order 順に一覧表示する。カード内のメタは Block Bindings。
 *
 * @package kanzaki
 */

?>
<!-- wp:group {"tagName":"section","anchor":"works","className":"p-top-section p-top-section--alt js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section p-top-section--alt js-reveal" id="works">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">Works</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp">作品</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"p-top-works__lead"} -->
<p class="p-top-works__lead">デザインから実装まで一貫して制作した作品です。気になる作品は、カードから詳細ページで制作プロセスをご覧いただけます。</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"p-top-section__body","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body">

<!-- wp:query {"queryId":1,"query":{"postType":"works","perPage":24,"pages":0,"offset":0,"order":"asc","orderBy":"menu_order","inherit":false}} -->
<div class="wp-block-query">
<!-- wp:post-template {"className":"p-top-works__grid","layout":{"type":"default"}} -->

<!-- wp:group {"className":"c-card","layout":{"type":"default"}} -->
<div class="wp-block-group c-card">

<!-- wp:group {"className":"c-card__media","layout":{"type":"default"}} -->
<div class="wp-block-group c-card__media">
<!-- wp:post-featured-image {"sizeSlug":"kanzaki-card"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"c-card__body","layout":{"type":"default"}} -->
<div class="wp-block-group c-card__body">

<!-- wp:group {"className":"c-card__tags","layout":{"type":"default"}} -->
<div class="wp-block-group c-card__tags">
<!-- wp:paragraph {"className":"c-card__badge","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_badge"}}}}} -->
<p class="c-card__badge"></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"c-card__category","metadata":{"bindings":{"content":{"source":"kanzaki/terms","args":{"taxonomy":"category","separator":" / "}}}}} -->
<p class="c-card__category"></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"className":"c-card__title"} /-->
<!-- wp:paragraph {"className":"c-card__title-note","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_subtitle"}}}}} -->
<p class="c-card__title-note"></p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"c-card__meta","layout":{"type":"default"}} -->
<div class="wp-block-group c-card__meta">
<!-- wp:paragraph {"className":"c-card__roles","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_role"}}}}} -->
<p class="c-card__roles"></p>
<!-- /wp:paragraph -->
<!-- wp:read-more {"content":"詳細を見る","className":"c-card__action"} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- /wp:post-template -->
</div>
<!-- /wp:query -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
