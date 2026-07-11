<?php
/**
 * Title: ヒーロー
 * Slug: kanzaki/hero
 * Categories: kanzaki
 * Inserter: no
 *
 * 波ワイプ・文字分割アニメーションのDOM完全一致が必須のため core/html で保持する。
 *
 * @package kanzaki
 */


$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:html -->
<section class="p-top-hero js-hero" aria-label="イントロダクション">
	<!-- 波の帯の中に現れる背景グラデーション -->
	<div class="p-top-hero__bg js-hero-bg" aria-hidden="true"></div>
	<!-- 「＋」モチーフ：ロゴの構成要素が方眼グリッドに沿って組み上がる（CSSアニメのみ） -->
	<div class="p-top-hero__plus-field" aria-hidden="true">
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
		<span class="p-top-hero__plus"></span>
	</div>
	<div class="l-container p-top-hero__content">
		<p class="p-top-hero__label">Kanzaki Masahiro — Web Design &amp; Coding</p>
		<h1 class="p-top-hero__title">
			<span class="p-top-hero__title-line">見やすく、伝わる</span>
			<span class="p-top-hero__title-line">デザインを。</span>
		</h1>
		<p class="p-top-hero__lead">デザインからコーディングまで一貫して担当。情報を整理し、見る人にきちんと「伝わる」Webサイトをつくります。</p>
		<div class="p-top-hero__actions">
			<a class="c-button c-button--primary" href="#works"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#images"></use></svg>作品を見る</a>
			<a class="c-button c-button--secondary" href="#contact"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#envelope-o"></use></svg>お問い合わせ</a>
		</div>
	</div>
	<p class="p-top-hero__vertical" aria-hidden="true">
		<span class="p-top-hero__vertical-col">正確なコーディングと</span>
		<span class="p-top-hero__vertical-col">共に。</span>
	</p>
	<div class="p-top-hero__scroll" aria-hidden="true">
		<span class="p-top-hero__scroll-label">Scroll</span>
	</div>
</section>
<!-- /wp:html -->
