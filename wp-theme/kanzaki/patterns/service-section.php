<?php
/**
 * Title: できること・制作の流れ
 * Slug: kanzaki/service-section
 * Categories: kanzaki
 * Inserter: no
 *
 * 担当できる範囲と制作の進め方。カードのアイコンは _wp-bridge.scss の
 * p-top-service__item--* 修飾クラス（CSS mask）で付与する。
 *
 * @package kanzaki
 */

$kanzaki_icons = esc_url( get_theme_file_uri( 'assets/images/icons.svg' ) );
?>
<!-- wp:group {"tagName":"section","anchor":"service","className":"p-top-section js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section js-reveal" id="service">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">
<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">Service</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp">できること</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"p-top-service__lead"} -->
<p class="p-top-service__lead">Figmaでのデザインから、コーディング・WordPress構築・公開後の計測まで、Webサイト制作の工程を一人で通して担当できます。</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"p-top-section__body","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body">
<!-- wp:group {"className":"p-top-service__list","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__list">
<!-- wp:group {"className":"p-top-service__item p-top-service__item--html5","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--html5">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">LP・Webサイト制作</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">構成・ワイヤーフレームからデザイン・コーディング・公開まで一貫して担当します。1ページのランディングページから、中小規模のコーポレートサイトまで制作しています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--wordpress","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--wordpress">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">WordPressサイト構築</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">オリジナルテーマで構築します。このサイトもブロックテーマを自作しており、更新する人がブロックエディタで迷わず編集できる形を心がけています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--figma","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--figma">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">デザイン・素材制作</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">Figmaでデザインを制作します。実装への受け渡しを前提にデータを組むため、ほかのコーダーへもスムーズに引き継げます。バナー・ロゴの制作も担当しています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--chart","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--chart">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">公開後の計測・改善</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">GA4・Googleサーチコンソールの導入と、アクセス状況の分析に対応します。表示速度やアクセシビリティも、実測しながら改善します。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"flow","level":3,"className":"p-top-service__sub-title"} -->
<h3 class="wp-block-heading p-top-service__sub-title" id="flow"><span class="p-top-service__sub-en" aria-hidden="true">Process</span><span class="p-top-service__sub-jp">制作の進め方</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"p-top-service__sub-lead"} -->
<p class="p-top-service__sub-lead">デザインと実装を一人で担当するからこそ、工程のあいだで意図が抜け落ちないように進めています。</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ol class="p-top-service__flow">
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">01</span>
<h4 class="p-top-service__step-name">ヒアリング</h4>
<p class="p-top-service__step-text">目的・ターゲット・参考サイトを確認し、ゴールを言葉にしてから設計に入ります。</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">02</span>
<h4 class="p-top-service__step-name">構成・ワイヤー</h4>
<p class="p-top-service__step-text">ページ構成と骨組みを先に固め、デザインに入ってからの大きな手戻りを防ぎます。</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">03</span>
<h4 class="p-top-service__step-name">デザイン</h4>
<p class="p-top-service__step-text">Figmaでデザインを作成。実装を見越して、余白や文字サイズのルールを揃えて組みます。</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">04</span>
<h4 class="p-top-service__step-name">実装</h4>
<p class="p-top-service__step-text">コーディング・WordPress構築。表示速度とアクセシビリティは実測で確かめます。</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">05</span>
<h4 class="p-top-service__step-name">公開・運用</h4>
<p class="p-top-service__step-text">サーバーへの公開とGA4等の計測設定まで担当。公開後の数字を見て改善につなげます。</p>
</li>
</ol>
<!-- /wp:html -->

<!-- wp:html -->
<div class="p-top-service__cta">
<p class="p-top-service__cta-text">作品の詳しい制作過程や、得意なことについてもお話しできます。お気軽にご連絡ください。</p>
<a class="c-button c-button--primary" href="#contact"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#envelope-o"></use></svg>お問い合わせ</a>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
