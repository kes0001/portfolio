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
<p class="p-top-profile__text">コーディングからキャリアを始め、現在はFigmaでのデザイン制作とフロントエンド実装の両方を担当しています。「見る人に伝わるデザイン」と「意図を正確に再現するコーディング」の両立を軸に、実案件では、イベント公式サイトやコーポレートサイトなど6件を担当しました。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">特にこだわっているのは、ユーザー目線での導線設計と、ブランドらしさを活かすレイアウト設計。スマートフォンでも快適に閲覧できるレスポンシブ対応や、ライブラリを用いた動的な演出にも取り組んでいます。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"p-top-profile__text"} -->
<p class="p-top-profile__text">デザインと実装のあいだで情報が迷子にならないものづくりを心がけています。今後はWebデザイナー兼フロントエンドとして、デザインと実装の両方に関われるチームで、企業やサービスの魅力を伝えるWebサイト制作に携わりたいと考えています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
