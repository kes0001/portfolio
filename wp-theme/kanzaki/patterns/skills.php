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
<!-- wp:group {"tagName":"section","anchor":"skills","className":"p-top-section p-top-section--alt js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section p-top-section--alt js-reveal" id="skills">
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
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>デザインカンプを崩さず再現するレスポンシブ実装</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>BEMとデザイントークンで書き方をルール化</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>@layer / oklch() などモダンCSS（本サイトで使用）</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--figma","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--figma">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">Figma</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>LP・コーポレートサイトのデザイン</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>auto-layoutとコンポーネントで組む、再利用できるデータ</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>コーダーが迷わない命名と余白で受け渡し</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--js","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--js">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">JavaScript</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>スライダー・アコーディオン・ドロワーのUI実装</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>スクロール連動・画面遷移の演出（本サイトで使用）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>「動きを減らす」設定に合わせて演出を止める設計</li>
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
<p class="p-top-skills__meta">本サイトで実践</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>オリジナルのブロックテーマを自作（本サイト）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>既存テーマのカスタマイズ</li>
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
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>バナー・ロゴ制作（ターゲット別に複数案を提案）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>チラシの入稿データ作成、Web用画像の書き出し・軽量化</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--robot","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--robot">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">AI活用（Claude Code）</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>実案件で構成から実装まで活用（津堅ハーリーほか）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>設計の判断と品質の最終確認は自分で行う</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-skills__item p-top-skills__item--chart","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-skills__item p-top-skills__item--chart">
<!-- wp:heading {"level":3,"className":"p-top-skills__name"} -->
<h3 class="wp-block-heading p-top-skills__name">サイト公開・計測設定</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-skills__meta p-top-skills__meta--solid"} -->
<p class="p-top-skills__meta p-top-skills__meta--solid">実案件で使用</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"p-top-skills__points"} -->
<ul class="wp-block-list p-top-skills__points"><!-- wp:list-item -->
<li>サーバーへの公開（独自ドメイン・SSL・WordPress移行）</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>GA4・Google Search Console の導入</li>
<!-- /wp:list-item --><!-- wp:list-item -->
<li>表示速度の改善（本サイトはデスクトップ全項目100点）</li>
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
