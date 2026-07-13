<?php
/**
 * Title: コンタクト
 * Slug: kanzaki/contact
 * Categories: kanzaki
 * Inserter: no
 *
 * 本文・ボタン・メールアドレスは標準ブロック（メールアドレスの正本は
 * mailto リンクの段落。コピーボタンはそこから取得する＝main.js参照）。
 * コピーボタンとステータス領域のみ、data属性/aria属性が必要なためHTMLブロック。
 * GitHubボタンのアイコンは kanzaki-button--github の ::before mask（_wp-bridge.scss）。
 *
 * @package kanzaki
 */

$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:group {"tagName":"section","anchor":"contact","className":"p-top-section p-top-contact js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section p-top-contact js-reveal" id="contact">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">Contact</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp">お問い合わせ</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-section__body","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body">

<!-- wp:paragraph {"className":"p-top-contact__text"} -->
<p class="p-top-contact__text">お仕事のご相談・ご質問など、お気軽にご連絡ください。下記フォームからお送りいただくか、メールでも承ります。</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"p-top-contact__form p-form","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-contact__form p-form">
<!-- wp:shortcode -->
[contact-form-7 id="21f9a58" title="お問い合わせ"]
<!-- /wp:shortcode -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"p-top-contact__actions"} -->
<div class="wp-block-buttons p-top-contact__actions">
<!-- wp:button {"className":"kanzaki-button--secondary"} -->
<div class="wp-block-button kanzaki-button--secondary"><a class="wp-block-button__link wp-element-button" href="mailto:kanmasa30@icloud.com">メールを送る</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"kanzaki-button--secondary kanzaki-button--github"} -->
<div class="wp-block-button kanzaki-button--secondary kanzaki-button--github"><a class="wp-block-button__link wp-element-button" href="https://github.com/kes0001" target="_blank" rel="noopener">GitHubでコードを見る</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:group {"className":"p-top-contact__mail","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-contact__mail">
<!-- wp:paragraph -->
<p><a href="mailto:kanmasa30@icloud.com">kanmasa30@icloud.com</a></p>
<!-- /wp:paragraph -->
<!-- wp:html -->
<button class="p-top-contact__copy js-copy-mail" type="button" aria-label="メールアドレスをコピーする">
	<svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#copy"></use></svg>
</button>
<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<p class="p-top-contact__copy-status js-copy-status" role="status" aria-live="polite"></p>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
