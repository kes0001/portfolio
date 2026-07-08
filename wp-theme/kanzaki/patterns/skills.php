<?php
/**
 * Title: スキル
 * Slug: kanzaki/skills
 * Categories: kanzaki
 * Inserter: no
 *
 * @package kanzaki
 */


$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:html -->
<section class="p-top-section js-reveal" id="skills">
	<div class="l-container">
		<h2 class="c-section-title">
			<span class="c-section-title__en">Skills</span>
			<span class="c-section-title__jp">スキル</span>
		</h2>
		<div class="p-top-section__body">
			<ul class="p-top-skills__list">
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#html5"></use></svg></span>
					<h3 class="p-top-skills__name">HTML / CSS（SCSS）</h3>
					<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
					<ul class="p-top-skills__points">
						<li>デザインカンプからのレスポンシブ実装（ピクセルパーフェクト）</li>
						<li>BEM設計・デザイントークン運用・コーディングルールの整備</li>
						<li>@layer / oklch() / カスケードレイヤー設計などモダンCSSの実践（本サイトで使用）</li>
					</ul>
				</li>
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#figma"></use></svg></span>
					<h3 class="p-top-skills__name">Figma / Adobe XD</h3>
					<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
					<ul class="p-top-skills__points">
						<li>LP・コーポレートサイトのデザイン制作</li>
						<li>auto-layout・コンポーネントによる再利用性の高いデータ設計</li>
						<li>実装への受け渡し（ハンドオフ）を前提とした命名・余白の一貫性</li>
					</ul>
				</li>
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#js"></use></svg></span>
					<h3 class="p-top-skills__name">JavaScript</h3>
					<p class="p-top-skills__meta">実装対応可</p>
					<ul class="p-top-skills__points">
						<li>スライダー・アコーディオン・ドロワーなどのUI実装</li>
						<li>IntersectionObserverによるスクロール演出（本サイトで使用）</li>
						<li>prefers-reduced-motionに配慮したアニメーション設計</li>
					</ul>
				</li>
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#wordpress"></use></svg></span>
					<h3 class="p-top-skills__name">WordPress / PHP</h3>
					<p class="p-top-skills__meta">カスタマイズ対応</p>
					<ul class="p-top-skills__points">
						<li>既存テーマのカスタマイズ</li>
						<li>本サイトのブロックテーマ化（オリジナルテーマ）を実践</li>
					</ul>
				</li>
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#palette"></use></svg></span>
					<h3 class="p-top-skills__name">Photoshop / Illustrator</h3>
					<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
					<ul class="p-top-skills__points">
						<li>バナー・ロゴ制作（ターゲット別の複数案提案）</li>
						<li>Web用画像の書き出し・軽量化（WebP対応）</li>
					</ul>
				</li>
				<li class="p-top-skills__item">
					<span class="p-top-skills__icon" aria-hidden="true"><svg class="c-icon"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#robot"></use></svg></span>
					<h3 class="p-top-skills__name">AI活用（Claude Code）</h3>
					<p class="p-top-skills__meta">検証・導入中</p>
					<ul class="p-top-skills__points">
						<li>Figma連携によるデザイン→コードのワークフロー構築</li>
						<li>本サイトのリニューアル・ブラッシュアップにも活用</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- /wp:html -->
