<?php
/**
 * Title: プロフィール
 * Slug: kanzaki/profile
 * Categories: kanzaki
 * Inserter: no
 *
 * 全体を標準ブロックで構成（エディタで見たまま編集できる）。
 * かなは RichText が span クラスを保持できないため独立した段落にしている。
 *
 * @package kanzaki
 */

?>
<!-- wp:group {"tagName":"section","anchor":"profile","className":"p-top-section js-reveal","layout":{"type":"default"}} -->
<section class="wp-block-group p-top-section js-reveal" id="profile">
<!-- wp:group {"className":"l-container","layout":{"type":"default"}} -->
<div class="wp-block-group l-container">

<!-- wp:group {"className":"c-section-title","layout":{"type":"default"}} -->
<div class="wp-block-group c-section-title">
<!-- wp:paragraph {"className":"c-section-title__en"} -->
<p class="c-section-title__en">Profile</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"c-section-title__jp"} -->
<h2 class="wp-block-heading c-section-title__jp">プロフィール</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"p-top-section__body p-top-profile__inner","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-section__body p-top-profile__inner">

<!-- wp:image {"className":"p-top-profile__figure"} -->
<figure class="wp-block-image p-top-profile__figure"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/prof-800.webp' ) ); ?>" alt="神﨑勝弘のプロフィール写真" width="600" height="800" loading="lazy" decoding="async"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"p-top-profile__name"} -->
<p class="p-top-profile__name">神﨑 勝弘</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__name-kana"} -->
<p class="p-top-profile__name-kana">かんざき まさひろ</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">コーディングからキャリアを始め、いまはデザインから実装、公開後の計測までを一人で通して担当しています。実案件は、イベント公式サイトやコーポレートサイトなど6件です。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">強みは、作る前に調べて言葉にすること。「第1回つけん島まつり」のLPでは類似イベント18件を調べたうえで、キャッチコピーと事前申込の導線を設計しました。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">デザインの意図が実装で崩れないよう、余白・文字サイズ・色を先にルールとして決め、Figmaとコードで同じ値を使います。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">Webデザイナー兼フロントエンドとして、デザインと実装の両方に関われるチームで働きたいと考えています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
