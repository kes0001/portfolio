<?php
/**
 * Title: ヘッダー
 * Slug: kanzaki/header
 * Categories: kanzaki
 * Inserter: no
 *
 * ロゴはマーク画像（site-logo.webp）＋サイト名（get_bloginfo で動的取得）。
 * 静的サイト版の l-header__logo と同一マークアップに揃える。
 * スキップリンク・バーガーボタン・ナビは main.js の開閉機構と
 * aria 属性が必要なため HTML ブロックのまま維持する。
 *
 * @package kanzaki
 */

$kanzaki_home = esc_url( home_url( '/' ) );
?>
<!-- wp:html -->
<a class="u-skip-link" href="#main">本文へスキップ</a>
<!-- /wp:html -->

<!-- wp:group {"tagName":"header","className":"l-header","layout":{"type":"default"}} -->
<header class="wp-block-group l-header">
<!-- wp:group {"className":"l-container l-header__inner","layout":{"type":"default"}} -->
<div class="wp-block-group l-container l-header__inner">

<!-- wp:html -->
<a class="l-header__logo" href="<?php echo $kanzaki_home; // phpcs:ignore ?>"><img class="l-header__logo-mark" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/site-logo.webp' ) ); ?>" alt="" width="278" height="270" /><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
<!-- /wp:html -->

<!-- wp:html -->
<button class="l-header__burger" aria-label="メニューを開く" aria-expanded="false" aria-controls="l-header-nav">
	<span class="l-header__burger-bar"></span>
	<span class="l-header__burger-bar"></span>
	<span class="l-header__burger-bar"></span>
</button>
<nav id="l-header-nav" class="l-header__nav" aria-label="メインナビゲーション">
	<ul class="l-header__nav-list">
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#works">Works</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#profile">Profile</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#skills">Skills</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#service">Service</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#contact">Contact</a></li>
	</ul>
</nav>
<!-- /wp:html -->

</div>
<!-- /wp:group -->
</header>
<!-- /wp:group -->
