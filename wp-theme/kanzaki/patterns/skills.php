<?php
/**
 * Title: スキル
 * Slug: kanzaki/skills
 * Categories: kanzaki
 * Inserter: no
 *
 * 全体を標準ブロックで構成。アイコンは RichText にSVGを保持できないため、
 * 各カードの modifier クラス（p-top-skills__item--*）の ::before mask で表示する
 * （_wp-bridge.scss 参照）。カードは .p-top-skills__list の直下に置くこと
 * （nth-child のスタッガー演出が直下の子要素に依存するため）。
 *
 * @package kanzaki
 */

?>
<!-- wp:group {"tagName":"section","anchor":"skills","className":"p-top-section js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section js-reveal" id="skills">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">Skills</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp">スキル</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-section__body","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body">

<!-- wp:group {"className":"p-top-skills__list","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__list">

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--html5","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--html5">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">HTML / CSS（SCSS）</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>デザインカンプからのレスポンシブ実装（ピクセルパーフェクト）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>BEM設計・デザイントークン運用・コーディングルールの整備</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>@layer / oklch() / カスケードレイヤー設計などモダンCSSの実践（本サイトで使用）</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--figma","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--figma">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">Figma / Adobe XD</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>LP・コーポレートサイトのデザイン制作</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>auto-layout・コンポーネントによる再利用性の高いデータ設計</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>実装への受け渡し（ハンドオフ）を前提とした命名・余白の一貫性</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--js","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--js">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">JavaScript</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta"} -->
<p class="p-top-skills__meta">実装対応可</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>スライダー・アコーディオン・ドロワーなどのUI実装</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>IntersectionObserverによるスクロール演出（本サイトで使用）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>prefers-reduced-motionに配慮したアニメーション設計</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--wordpress","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--wordpress">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">WordPress / PHP</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta"} -->
<p class="p-top-skills__meta">カスタマイズ対応</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>既存テーマのカスタマイズ</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>本サイトのブロックテーマ化（オリジナルテーマ）を実践</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--palette","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--palette">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">Photoshop / Illustrator</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実務レベル</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>バナー・ロゴ制作（ターゲット別の複数案提案）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>Web用画像の書き出し・軽量化（WebP対応）</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--robot","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--robot">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">AI活用（Claude Code）</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta"} -->
<p class="p-top-skills__meta">検証・導入中</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>Figma連携によるデザイン→コードのワークフロー構築</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>本サイトのリニューアル・ブラッシュアップにも活用</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
