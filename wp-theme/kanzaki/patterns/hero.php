<?php
/**
 * Title: ヒーロー
 * Slug: kanzaki/hero
 * Categories: kanzaki
 * Inserter: no
 *
 * 演出用のDOM（＋モチーフ・タイトルの行分割）を崩さないため core/html で保持する。
 * 作品のタイル並びは inc/hero-works.php が目印コメントを表示時に差し替える。
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
		<h1 class="p-top-hero__title">
			<span class="p-top-hero__title-line">見やすく、伝わる</span>
			<span class="p-top-hero__title-line">デザインを。</span>
		</h1>
		<p class="p-top-hero__sub">正確なコーディングと共に。</p>
		<p class="p-top-hero__lead"><span class="p-top-hero__lead-main">Figmaでの<wbr>デザインから、<wbr><span class="p-top-hero__lead-pair">コーディング<span class="p-top-hero__lead-dot">・</span><wbr>WordPress構築まで</span><wbr>一人で担当。</span><span class="p-top-hero__lead-more">情報を<wbr>整理し、<wbr>見る人に<wbr>きちんと<wbr>「伝わる」<wbr>Webサイトを<wbr>つくります。</span></p>
		<div class="p-top-hero__actions">
			<a class="c-button c-button--primary" href="#works"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#images"></use></svg>作品を見る</a>
			<a class="c-button c-button--secondary" href="#contact"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#envelope-o"></use></svg>お問い合わせ</a>
		</div>
		<!--kanzaki:hero-works-->
		<p class="p-top-hero__vertical" aria-hidden="true">
			<span class="p-top-hero__vertical-col">正確なコーディングと</span>
			<span class="p-top-hero__vertical-col">共に。</span>
		</p>
	</div>
</section>
<!-- /wp:html -->
