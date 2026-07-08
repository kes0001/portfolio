<?php
/**
 * Title: プロフィール
 * Slug: kanzaki/profile
 * Categories: kanzaki
 * Inserter: no
 *
 * @package kanzaki
 */

?>
<!-- wp:html -->
<section class="p-top-section p-top-section--alt js-reveal" id="profile">
	<div class="l-container">
		<h2 class="c-section-title">
			<span class="c-section-title__en">Profile</span>
			<span class="c-section-title__jp">プロフィール</span>
		</h2>
		<div class="p-top-section__body p-top-profile__inner">
			<picture>
				<source srcset="<?php echo esc_url( get_theme_file_uri( 'assets/images/prof-800.webp' ) ); ?>" type="image/webp" />
				<img class="p-top-profile__photo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/prof.png' ) ); ?>" alt="神﨑勝弘のプロフィール写真" width="1086" height="1448" loading="lazy" decoding="async" />
			</picture>
			<div>
				<p class="p-top-profile__name">神﨑 勝弘<span class="p-top-profile__name-kana">かんざき まさひろ</span></p>
				<p class="p-top-profile__text">コーディングからキャリアを始め、現在はFigmaでのデザイン制作とフロントエンド実装の両方を担当しています。「見る人に伝わるデザイン」と「意図を正確に再現するコーディング」の両立を軸に、実務を想定した制作を重ねてきました。</p>
				<p class="p-top-profile__text">特にこだわっているのは、ユーザー目線での導線設計と、ブランドらしさを活かすレイアウト設計。スマートフォンでも快適に閲覧できるレスポンシブ対応や、ライブラリを用いた動的な演出にも取り組んでいます。</p>
				<p class="p-top-profile__text">デザインと実装のあいだで情報が迷子にならないものづくりを心がけ、企業やサービスの魅力をしっかり伝えるWebサイト制作に携わっていきたいと考えています。</p>
			</div>
		</div>
	</div>
</section>
<!-- /wp:html -->
