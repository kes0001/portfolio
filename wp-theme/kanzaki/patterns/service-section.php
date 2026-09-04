<?php
/**
 * Title: できること・制作の流れ
 * Slug: kanzaki/service-section
 * Categories: kanzaki
 * Inserter: no
 *
 * 副業・ご依頼向けの案内。カードのアイコンは _wp-bridge.scss の
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
<p class="p-top-service__lead">LP・コーポレートサイトを中心に、下記の範囲でお仕事をお受けしています。デザインのみ・実装のみといった部分的なご依頼も可能です。</p>
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
<p class="p-top-service__text">構成・ワイヤーフレームからデザイン・コーディング・公開まで一貫して対応します。1ページのランディングページから、中小規模のコーポレートサイトまでお受けできます。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--wordpress","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--wordpress">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">WordPressサイト構築</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">オリジナルテーマでの構築に対応します。ブロックエディタで運用できる形で納品するため、公開後はお客様ご自身の手でお知らせやページの更新ができます。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--figma","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--figma">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">デザイン・素材制作</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">Figmaでのデザイン単体のご依頼にも対応します。実装への受け渡しを前提としたデータ設計で納品するため、別のコーダーさんへもスムーズに引き継げます。バナー・ロゴの制作も可能です。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"p-top-service__item p-top-service__item--chart","layout":{"type":"default"}} -->
<div class="wp-block-group p-top-service__item p-top-service__item--chart">
<!-- wp:heading {"level":3,"className":"p-top-service__name"} -->
<h3 class="wp-block-heading p-top-service__name">公開後の計測・改善</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"p-top-service__text"} -->
<p class="p-top-service__text">GA4・Googleサーチコンソールの導入と、アクセス状況のレポート作成に対応します。表示速度やアクセシビリティの改善もご相談いただけます。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"anchor":"pricing","level":3,"className":"p-top-service__sub-title"} -->
<h3 class="wp-block-heading p-top-service__sub-title" id="pricing"><span class="p-top-service__sub-en" aria-hidden="true">Pricing</span><span class="p-top-service__sub-jp">料金の目安</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"p-top-service__sub-lead"} -->
<p class="p-top-service__sub-lead">金額は目安です。内容とボリュームに応じて正式なお見積りをご提示します（お見積りは無料です）。</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ul class="p-top-service__plan-list">
<li class="p-top-service__plan">
<h4 class="p-top-service__plan-name">LP制作</h4>
<p class="p-top-service__plan-price">120,000<span class="p-top-service__plan-unit">円〜</span></p>
<dl class="p-top-service__plan-specs">
<div class="p-top-service__plan-row"><dt>ページ数</dt><dd>1ページ</dd></div>
<div class="p-top-service__plan-row"><dt>構成・ワイヤー</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>デザイン</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>コーディング</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>期間目安</dt><dd>3〜4週間</dd></div>
</dl>
</li>
<li class="p-top-service__plan">
<h4 class="p-top-service__plan-name">コーポレートサイト制作</h4>
<p class="p-top-service__plan-price">250,000<span class="p-top-service__plan-unit">円〜</span></p>
<dl class="p-top-service__plan-specs">
<div class="p-top-service__plan-row"><dt>ページ数</dt><dd>〜5ページ</dd></div>
<div class="p-top-service__plan-row"><dt>構成・ワイヤー</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>デザイン</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>コーディング</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>期間目安</dt><dd>1〜2ヶ月</dd></div>
</dl>
</li>
<li class="p-top-service__plan">
<h4 class="p-top-service__plan-name">WordPress構築</h4>
<p class="p-top-service__plan-price">＋80,000<span class="p-top-service__plan-unit">円〜</span></p>
<dl class="p-top-service__plan-specs">
<div class="p-top-service__plan-row"><dt>テーマ</dt><dd>オリジナル</dd></div>
<div class="p-top-service__plan-row"><dt>更新画面</dt><dd>ブロックエディタ</dd></div>
<div class="p-top-service__plan-row"><dt>更新レクチャー</dt><dd>込み</dd></div>
<div class="p-top-service__plan-row"><dt>ご自身での更新</dt><dd>可能</dd></div>
<div class="p-top-service__plan-row"><dt>期間目安</dt><dd>＋1週間〜</dd></div>
</dl>
</li>
</ul>
<p class="p-top-service__plan-note">※ WordPress構築は、LP・コーポレートサイト制作に追加するオプションです。</p>
<h4 class="p-top-service__detail-title">全プラン共通</h4>
<ul class="p-top-service__include-list">
<li>レスポンシブ対応</li>
<li>基本SEO・OGP設定</li>
<li>GA4・サーチコンソール初期設定</li>
<li>表示速度・アクセシビリティ配慮</li>
<li>公開後2週間の不具合修正</li>
</ul>
<h4 class="p-top-service__detail-title">単品メニュー・追加費用</h4>
<dl class="p-top-service__price-list">
<div class="p-top-service__price-row">
<dt class="p-top-service__price-name">バナー制作</dt>
<dd class="p-top-service__price-value">8,000円〜／枚</dd>
</div>
<div class="p-top-service__price-row">
<dt class="p-top-service__price-name">ロゴ制作<span class="p-top-service__price-scope">複数案のご提案つき</span></dt>
<dd class="p-top-service__price-value">50,000円〜</dd>
</div>
<div class="p-top-service__price-row">
<dt class="p-top-service__price-name">ページ追加<span class="p-top-service__price-scope">6ページ目以降</span></dt>
<dd class="p-top-service__price-value">＋30,000円〜／ページ</dd>
</div>
<div class="p-top-service__price-row">
<dt class="p-top-service__price-name">原稿作成・写真選定の代行</dt>
<dd class="p-top-service__price-value">＋20,000円〜</dd>
</div>
<div class="p-top-service__price-row">
<dt class="p-top-service__price-name">公開後の更新・保守代行</dt>
<dd class="p-top-service__price-value">月5,000円〜</dd>
</div>
</dl>
<p class="p-top-service__price-note">※ デザインのみ・実装のみなど部分的なご依頼もご相談いただけます。複数メニューの組み合わせは、セット料金でお見積りします。</p>
<!-- /wp:html -->

<!-- wp:heading {"anchor":"flow","level":3,"className":"p-top-service__sub-title"} -->
<h3 class="wp-block-heading p-top-service__sub-title" id="flow"><span class="p-top-service__sub-en" aria-hidden="true">Flow</span><span class="p-top-service__sub-jp">制作の流れ</span></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"p-top-service__sub-lead"} -->
<p class="p-top-service__sub-lead">期間はLP制作（1ページ）の目安です。コーポレートサイト（〜5ページ）は全体で1〜2ヶ月ほどです。</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<ol class="p-top-service__flow">
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">01</span>
<h4 class="p-top-service__step-name">ヒアリング</h4>
<p class="p-top-service__step-meta">目安 2〜3日</p>
<p class="p-top-service__step-text">目的・ターゲット・参考サイトを伺い、ゴールのすり合わせをします。</p>
<p class="p-top-service__step-ask">お願い：参考サイト・資料のご共有</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">02</span>
<h4 class="p-top-service__step-name">構成・ワイヤー</h4>
<p class="p-top-service__step-meta">目安 3〜5日</p>
<p class="p-top-service__step-text">ページ構成と骨組みを先にご確認いただき、方向性を固めてから進めます。</p>
<p class="p-top-service__step-ask">お願い：構成のご確認</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">03</span>
<h4 class="p-top-service__step-name">デザイン</h4>
<p class="p-top-service__step-meta">目安 1〜1.5週間</p>
<p class="p-top-service__step-text">Figmaでデザインを作成し、確認と修正のやりとりを重ねて仕上げます。</p>
<p class="p-top-service__step-ask">お願い：デザインのご確認・修正のご指示</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">04</span>
<h4 class="p-top-service__step-name">実装</h4>
<p class="p-top-service__step-meta">目安 1〜1.5週間</p>
<p class="p-top-service__step-text">コーディング・WordPress構築。表示速度とアクセシビリティに配慮します。</p>
<p class="p-top-service__step-ask">お願い：原稿・写真の最終確認</p>
</li>
<li class="p-top-service__step">
<span class="p-top-service__step-num" aria-hidden="true">05</span>
<h4 class="p-top-service__step-name">公開・運用</h4>
<p class="p-top-service__step-meta">目安 2〜3日</p>
<p class="p-top-service__step-text">サーバーへの公開、GA4等の計測設定まで対応。公開後のご相談も承ります。</p>
<p class="p-top-service__step-ask">お願い：サーバー情報のご提供</p>
</li>
</ol>
<!-- /wp:html -->

<!-- wp:heading {"anchor":"faq","level":3,"className":"p-top-service__sub-title"} -->
<h3 class="wp-block-heading p-top-service__sub-title" id="faq"><span class="p-top-service__sub-en" aria-hidden="true">FAQ</span><span class="p-top-service__sub-jp">よくあるご質問</span></h3>
<!-- /wp:heading -->

<!-- wp:html -->
<div class="p-top-service__faq">
<div class="p-top-service__faq-group">
<h4 class="p-top-service__faq-label">ご依頼前</h4>
<div class="p-top-service__faq-list">
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>予算が限られているのですが、相談できますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>はい。ご予算に応じてページ構成や制作範囲を調整したプランをご提案します。掲載の料金はあくまで目安ですので、まずはお気軽にご相談ください。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>原稿や写真が用意できなくても依頼できますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>はい。ヒアリングをもとに原稿の下書きから対応できます。写真素材の選定・ご提案も可能です。実案件「津堅島シークルーズ」では、原稿と写真素材の準備も担当しました。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>サーバーやドメインの契約がよく分からなくても大丈夫ですか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>はい。目的とご予算に合ったレンタルサーバー・独自ドメインの選定から、契約のサポート、公開作業までお手伝いします。本サイトも自分でサーバー契約から公開・計測設定までを行っています。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>打ち合わせは対面ですか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>オンライン（Zoom・Google Meet）とメール・チャットでのやりとりを基本に、全国からのご依頼に対応しています。</p></div>
</details>
</div>
</div>
<div class="p-top-service__faq-group">
<h4 class="p-top-service__faq-label">制作中</h4>
<div class="p-top-service__faq-list">
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>制作期間はどれくらいかかりますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>目安として、LPはデザイン＋コーディングで3〜4週間、コーポレートサイト（〜5ページ）は1〜2ヶ月ほどです。内容やご確認のペースにより前後します。お急ぎの場合もまずはご相談ください。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>デザインの修正は何回までできますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>デザイン段階での修正は2回まで料金内で対応します。構成・ワイヤーの段階で方向性をすり合わせてから進めるため、大きな手戻りが起きにくい流れにしています。3回目以降は内容に応じて別途お見積りします。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>制作中のやりとりや進捗確認はどのように行いますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>「構成・ワイヤー」「デザイン」「実装」の各工程の節目で、確認のご連絡をします。実装中はテスト用URLを共有しますので、実際の画面をスマートフォンからもご確認いただけます。</p></div>
</details>
</div>
</div>
<div class="p-top-service__faq-group">
<h4 class="p-top-service__faq-label">公開後・費用</h4>
<div class="p-top-service__faq-list">
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>お支払いのタイミングを教えてください。<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>着手時に50%、納品後に残りの50%を銀行振込でお願いしています。請求書を発行しますので、法人様の締め支払いにも対応できます。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>公開後の更新や運用もお願いできますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>WordPressで構築する場合は、お客様ご自身で更新できる形で納品します。更新作業の代行（月5,000円〜）や、GA4を使ったアクセスレポートの作成もご相談いただけます。</p></div>
</details>
<details class="c-accordion" name="faq">
<summary class="c-accordion__summary"><span class="c-accordion__label">Q.</span>納品後に不具合が見つかった場合はどうなりますか？<span class="c-accordion__icon" aria-hidden="true"></span></summary>
<div class="c-accordion__content"><span class="c-accordion__label">A.</span><p>公開後2週間以内の表示崩れや動作の不具合は、無償で修正します。それ以降の改修や機能追加は、内容に応じてお見積りします。</p></div>
</details>
</div>
</div>
</div>
<!-- /wp:html -->

<!-- wp:html -->
<div class="p-top-service__cta">
<p class="p-top-service__cta-text">料金や進め方について、まずはお気軽にご相談ください。お見積りは無料です。</p>
<a class="c-button c-button--primary" href="#contact"><svg class="c-icon" aria-hidden="true"><use href="<?php echo $kanzaki_icons; // phpcs:ignore ?>#envelope-o"></use></svg>相談してみる</a>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</section>
<!-- /wp:group -->
