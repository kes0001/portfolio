<?php
/**
 * Title: ヘッダー
 * Slug: kanzaki/header
 * Categories: kanzaki
 * Inserter: no
 *
 * @package kanzaki
 */

$kanzaki_home = esc_url( home_url( '/' ) );
?>
<!-- wp:html -->
<a class="u-skip-link" href="#main">本文へスキップ</a>
<header class="l-header">
	<div class="l-container l-header__inner">
		<a class="l-header__logo" href="<?php echo $kanzaki_home; // phpcs:ignore WordPress.Security.EscapeOutput ?>">KANZAKI</a>
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
		<button class="l-header__theme js-theme-toggle" type="button" aria-label="配色テーマを切り替える" aria-pressed="false">
			<svg class="c-icon l-header__theme-icon l-header__theme-icon--moon" aria-hidden="true"><use href="#moon"></use></svg>
			<svg class="c-icon l-header__theme-icon l-header__theme-icon--sun" aria-hidden="true"><use href="#sun"></use></svg>
		</button>
	</div>
</header>
<!-- /wp:html -->
