<?php
/**
 * GA4 測定タグ + Search Console 所有権確認メタタグ。
 *
 * 計測漏れを減らすため head のできるだけ上に出す（wp_head 優先度 1）。
 * gtag スニペットは Google 配布の標準形をそのまま使う。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

/** GA4 測定ID（プロパティ「kanzaki」/ ストリーム kanzaki-site） */
const KANZAKI_GA4_ID = 'G-J4RXY3ZW0L';

/** Search Console 所有権確認トークン（URLプレフィックス型） */
const KANZAKI_GSC_VERIFICATION = 'H6n-iBCV30dKyBsj94QLOyOgV8Hi7rmWB_uzlp4rxR4';

add_action(
	'wp_head',
	function () {
		?>
<meta name="google-site-verification" content="<?php echo esc_attr( KANZAKI_GSC_VERIFICATION ); ?>" />
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( KANZAKI_GA4_ID ); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo esc_js( KANZAKI_GA4_ID ); ?>');
</script>
		<?php
	},
	1
);
