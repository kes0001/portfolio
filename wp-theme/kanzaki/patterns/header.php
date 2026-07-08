<?php
/**
 * Title: ヘッダー
 * Slug: kanzaki/header
 * Categories: kanzaki
 * Inserter: no
 *
 * ロゴはサイトタイトルブロック（管理画面の「サイト名」で編集可能）。
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

<!-- wp:site-title {"level":0,"className":"l-header__logo"} /-->

<!-- wp:html -->
<button class="l-header__burger" aria-label="メニューを開く" aria-expanded="false" aria-controls="l-header-nav">
	<span class="l-header__burger-bar"></span>
	<span class="l-header__burger-bar"></span>
	<span class="l-header__burger-bar"></span>
</button>
<nav id="l-header-nav" class="l-header__nav" aria-label="メインナビゲーション">
	<ul class="l-header__nav-list">
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#profile">Profile</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#skills">Skills</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#works">Works</a></li>
		<li><a class="l-header__nav-link" href="<?php echo $kanzaki_home; // phpcs:ignore ?>#contact">Contact</a></li>
	</ul>
</nav>
<!-- /wp:html -->

</div>
<!-- /wp:group -->
</header>
<!-- /wp:group -->
