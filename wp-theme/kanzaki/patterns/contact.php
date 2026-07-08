<?php
/**
 * Title: コンタクト
 * Slug: kanzaki/contact
 * Categories: kanzaki
 * Inserter: no
 *
 * @package kanzaki
 */


$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:html -->
<section class="p-top-section p-top-section--alt p-top-contact js-reveal" id="contact">
	<div class="l-container">
		<h2 class="c-section-title">
			<span class="c-section-title__en">Contact</span>
			<span class="c-section-title__jp">お問い合わせ</span>
		</h2>
		<div class="p-top-section__body">
			<p class="p-top-contact__text">お仕事のご相談・ご質問など、お気軽にご連絡ください。</p>
			<div class="p-top-contact__actions">
				<a class="c-button c-button--primary" href="mailto:kanmasa30@icloud.com">メールを送る</a>
				<a class="c-button c-button--secondary" href="https://github.com/kes0001" target="_blank" rel="noopener"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#github"></use></svg>GitHubでコードを見る</a>
			</div>
			<p class="p-top-contact__mail">
				<a href="mailto:kanmasa30@icloud.com">kanmasa30@icloud.com</a>
				<button class="p-top-contact__copy js-copy-mail" type="button" data-mail="kanmasa30@icloud.com" aria-label="メールアドレスをコピーする">
					<svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#copy"></use></svg>
				</button>
			</p>
			<p class="p-top-contact__copy-status js-copy-status" role="status" aria-live="polite"></p>
		</div>
	</div>
</section>
<!-- /wp:html -->
