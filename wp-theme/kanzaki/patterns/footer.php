<?php
/**
 * Title: フッター
 * Slug: kanzaki/footer
 * Categories: kanzaki
 * Inserter: no
 *
 * @package kanzaki
 */


$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:html -->
<footer class="l-footer">
	<div class="l-container l-footer__inner">
		<ul class="l-footer__links">
			<li>
				<a class="l-footer__link" href="https://github.com/kes0001" target="_blank" rel="noopener"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#github"></use></svg>GitHub</a>
			</li>
			<li>
				<a class="l-footer__link" href="mailto:kanmasa30@icloud.com"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#envelope"></use></svg>kanmasa30@icloud.com</a>
			</li>
		</ul>
		<p class="l-footer__copyright">&copy; <span class="js-year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> KANZAKI</p>
	</div>
</footer>
<!-- /wp:html -->
