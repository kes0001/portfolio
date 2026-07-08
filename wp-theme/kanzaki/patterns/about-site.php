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
<p class="p-top-note__text">本サイトはテンプレートを使わず、自身で整備したコーディングルール（BEM設計・デザイントークン・SCSSのコンポーネント分割）に基づいて、設計から実装まで一貫して制作しています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">CSSは @layer によるカスケード管理、oklch() によるカラートークン設計、WebPによる画像最適化まで、ルールに定めたモダンな手法をこのサイト自身で実践しています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-note__text"} -->
<p class="p-top-note__text">デザインはFigmaで制作し、実装ワークフローの一部にAI（Claude Code）を活用。フロントエンドはWordPressオリジナルブロックテーマとして実装し、「どう作るか」という設計判断そのものも含めて、制作プロセスを作品の一部としてご覧いただけます。</p>
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
