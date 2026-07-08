<?php
/**
 * SEO・OGP・JSON-LD・head周りの最小実装（プラグインなし前提）。
 * 静的版 index.html / works/*.html の head 出力を再現する。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

const KANZAKI_SITE_NAME  = 'KANZAKI Portfolio';
const KANZAKI_FRONT_TITLE = 'KANZAKI Portfolio | Webデザイン・コーディング';
const KANZAKI_FRONT_DESC  = 'Webデザイナー・コーダー神﨑勝弘のポートフォリオ。Figmaでのデザイン制作からHTML/SCSS/JavaScriptによる実装まで一貫して担当。実案件・課題制作の実績を、担当範囲と工夫のポイントとともに紹介します。';

/** タイトル（コアの title-tag 出力を上書き） */
add_filter(
	'pre_get_document_title',
	function () {
		if ( is_front_page() ) {
			return KANZAKI_FRONT_TITLE;
		}
		if ( is_singular( 'works' ) ) {
			return single_post_title( '', false ) . ' | ' . KANZAKI_SITE_NAME;
		}
		return '';
	}
);

/** description・OGP・canonical(front)・theme-color・favicon */
add_action(
	'wp_head',
	function () {
		$is_work = is_singular( 'works' );
		$title   = is_front_page() ? KANZAKI_FRONT_TITLE : wp_get_document_title();

		if ( is_front_page() ) {
			$desc  = KANZAKI_FRONT_DESC;
			$url   = home_url( '/' );
			$image = get_theme_file_uri( 'assets/images/ogp.png' );
			$type  = 'website';
		} elseif ( $is_work ) {
			$desc  = get_the_excerpt();
			$url   = get_permalink();
			$image = get_the_post_thumbnail_url( null, 'full' );
			$image = $image ? $image : get_theme_file_uri( 'assets/images/ogp.png' );
			$type  = 'article';
		} else {
			$desc  = KANZAKI_FRONT_DESC;
			$url   = home_url( '/' );
			$image = get_theme_file_uri( 'assets/images/ogp.png' );
			$type  = 'website';
		}
		?>
		<meta name="description" content="<?php echo esc_attr( $desc ); ?>" />
		<?php if ( is_front_page() ) : // singular はコアの rel_canonical に任せる ?>
		<link rel="canonical" href="<?php echo esc_url( $url ); ?>" />
		<?php endif; ?>
		<meta property="og:type" content="<?php echo esc_attr( $type ); ?>" />
		<meta property="og:url" content="<?php echo esc_url( $url ); ?>" />
		<meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
		<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>" />
		<meta property="og:image" content="<?php echo esc_url( $image ); ?>" />
		<meta property="og:site_name" content="<?php echo esc_attr( KANZAKI_SITE_NAME ); ?>" />
		<meta property="og:locale" content="ja_JP" />
		<meta name="twitter:card" content="summary_large_image" />
		<link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/favicon.svg' ) ); ?>" type="image/svg+xml" />
		<link rel="apple-touch-icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/apple-touch-icon.png' ) ); ?>" />
		<meta name="theme-color" content="#ffffff" />
		<?php
	},
	4
);

/** JSON-LD（front: Person + WebSite / works: BreadcrumbList） */
add_action(
	'wp_head',
	function () {
		$schemas = array();

		if ( is_front_page() ) {
			$schemas[] = array(
				'@context'      => 'https://schema.org',
				'@type'         => 'Person',
				'name'          => '神﨑勝弘',
				'alternateName' => 'Kanzaki Masahiro',
				'jobTitle'      => 'Webデザイナー・コーダー',
				'url'           => home_url( '/' ),
				'email'         => 'mailto:kanmasa30@icloud.com',
				'knowsAbout'    => array( 'HTML', 'CSS', 'Sass', 'JavaScript', 'Figma', 'WordPress', 'Photoshop', 'Illustrator' ),
			);
			$schemas[] = array(
				'@context' => 'https://schema.org',
				'@type'    => 'WebSite',
				'name'     => KANZAKI_SITE_NAME,
				'url'      => home_url( '/' ),
			);
		}

		if ( is_singular( 'works' ) ) {
			$schemas[] = array(
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => array(
					array(
						'@type'    => 'ListItem',
						'position' => 1,
						'name'     => 'ホーム',
						'item'     => home_url( '/' ),
					),
					array(
						'@type'    => 'ListItem',
						'position' => 2,
						'name'     => 'Works',
						'item'     => home_url( '/#works' ),
					),
					array(
						'@type'    => 'ListItem',
						'position' => 3,
						'name'     => single_post_title( '', false ),
					),
				),
			);
		}

		foreach ( $schemas as $schema ) {
			echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
		}
	},
	6
);
