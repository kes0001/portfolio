<?php
/**
 * Title: 作品詳細ヘッダー
 * Slug: kanzaki/work-detail-header
 * Categories: kanzaki
 * Inserter: no
 *
 * 戻るリンク〜アイキャッチまで。投稿ごとのデータは Bindings / 専用ブロックで表示。
 *
 * @package kanzaki
 */

?>
<!-- wp:paragraph {"className":"p-work__back-nav"} -->
<p class="p-work__back-nav"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#works">Worksに戻る</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"p-work__eyebrow","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_eyebrow"}}}}} -->
<p class="p-work__eyebrow"></p>
<!-- /wp:paragraph -->

<!-- wp:post-title {"level":1,"className":"p-work__title"} /-->

<!-- wp:paragraph {"className":"p-work__title-note","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_subtitle"}}}}} -->
<p class="p-work__title-note"></p>
<!-- /wp:paragraph -->

<!-- wp:post-excerpt {"excerptLength":100,"className":"p-work__lead"} /-->

<!-- wp:group {"className":"p-work__meta","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__meta">
<!-- wp:group {"className":"p-work__meta-item","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__meta-item">
<!-- wp:paragraph {"className":"p-work__meta-label"} -->
<p class="p-work__meta-label">Role</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-work__meta-value","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_role"}}}}} -->
<p class="p-work__meta-value"></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-work__meta-item","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__meta-item">
<!-- wp:paragraph {"className":"p-work__meta-label"} -->
<p class="p-work__meta-label">Tools</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-work__meta-value","metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"kanzaki_tools"}}}}} -->
<p class="p-work__meta-value"></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"p-work__actions"} -->
<div class="wp-block-buttons p-work__actions">
<!-- wp:button {"className":"kanzaki-external-button","metadata":{"bindings":{"url":{"source":"core/post-meta","args":{"key":"kanzaki_site_url"}}}}} -->
<div class="wp-block-button kanzaki-external-button"><a class="wp-block-button__link wp-element-button" target="_blank" rel="noopener">公開サイトを見る</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"kanzaki-figma-button kanzaki-button--secondary","metadata":{"bindings":{"url":{"source":"core/post-meta","args":{"key":"kanzaki_figma_url"}}}}} -->
<div class="wp-block-button kanzaki-figma-button kanzaki-button--secondary"><a class="wp-block-button__link wp-element-button" target="_blank" rel="noopener">デザインデータを見る</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:group {"className":"p-work__device","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__device">
<!-- wp:group {"className":"p-work__device-screen","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__device-screen">
<!-- wp:post-featured-image {"className":"p-work__thumbnail","sizeSlug":"full"} /-->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-work__device-base","layout":{"type":"default"}} -->
<div class="wp-block-group p-work__device-base"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
