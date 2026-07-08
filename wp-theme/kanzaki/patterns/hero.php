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

?>
<!-- wp:html -->
<section class="p-top-hero js-hero" aria-label="イントロダクション">
	<!-- 波の帯の中に現れる背景グラデーション -->
	<div class="p-top-hero__bg js-hero-bg" aria-hidden="true"></div>
	<!-- ストロークワイプ：波形ストロークのマスクで背景を描き出す -->
	<div class="p-top-hero__cover" aria-hidden="true">
		<svg class="p-top-hero__cover-svg" viewBox="0 0 1920 1100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
			<defs>
				<mask id="hero-wave-mask">
					<rect x="0" y="0" width="100%" height="100%" fill="white"></rect>
					<path class="js-hero-wave" d="M512 -30 C504 156 777 642 1249 310 C1237 384 1178 793 1647 815 C1979 830 2126 421 2126 421" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"></path>
				</mask>
			</defs>
			<rect class="p-top-hero__cover-rect" x="0" y="0" width="100%" height="100%" mask="url(#hero-wave-mask)"></rect>
		</svg>
	</div>
	<div class="l-container p-top-hero__content">
		<p class="p-top-hero__label">Kanzaki Masahiro — Web Design &amp; Coding</p>
		<h1 class="p-top-hero__title">
			<span class="p-top-hero__title-line">見やすく、伝わる</span>
			<span class="p-top-hero__title-line">デザインを。</span>
		</h1>
		<p class="p-top-hero__lead">デザインからコーディングまで一貫して担当。情報を整理し、見る人にきちんと「伝わる」Webサイトをつくります。</p>
		<div class="p-top-hero__actions">
			<a class="c-button c-button--primary" href="#works"><svg class="c-icon" aria-hidden="true"><use href="#images"></use></svg>作品を見る</a>
			<a class="c-button c-button--secondary" href="#contact"><svg class="c-icon" aria-hidden="true"><use href="#envelope-o"></use></svg>お問い合わせ</a>
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
