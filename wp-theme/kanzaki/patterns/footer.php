<?php
/**
 * Title: フッター
 * Slug: kanzaki/footer
 * Categories: kanzaki
 * Inserter: no
 *
 * 全体を標準ブロックで構成。アイコンは l-footer__item--* の ::before mask
 * （_wp-bridge.scss）。年はサーバー側で出力する（.js-year は静的サイト専用）。
 *
 * @package kanzaki
 */

?>
<!-- wp:group {"tagName":"footer","className":"l-footer","layout":{"type":"default"}} -->
<footer class="wp-block-group l-footer">
<!-- wp:group {"className":"l-container l-footer__inner","layout":{"type":"default"}} -->
<div class="wp-block-group l-container l-footer__inner">

<!-- wp:group {"className":"l-footer__links","layout":{"type":"default"}} -->
<div class="wp-block-group l-footer__links">
<!-- wp:paragraph {"className":"l-footer__item l-footer__item--envelope"} -->
<p class="l-footer__item l-footer__item--envelope"><a href="mailto:kanmasa30@icloud.com">kanmasa30@icloud.com</a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"l-footer__copyright"} -->
<p class="l-footer__copyright">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> KANZAKI</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
</footer>
<!-- /wp:group -->
