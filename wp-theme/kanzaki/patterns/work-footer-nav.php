<?php
/**
 * Title: 作品詳細フッターナビ
 * Slug: kanzaki/work-footer-nav
 * Categories: kanzaki
 * Inserter: no
 *
 * リンクの見た目は .p-work__footer-nav a に委譲（RichText内のリンクは
 * クラスを保持できないため、クラスは親段落に付ける）。
 *
 * @package kanzaki
 */

?>
<!-- wp:paragraph {"className":"p-work__footer-nav"} -->
<p class="p-work__footer-nav"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#works">Worksに戻る</a></p>
<!-- /wp:paragraph -->
