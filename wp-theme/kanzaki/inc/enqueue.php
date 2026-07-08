<?php
/**
 * アセット読み込み（CSS / JS / Google Fonts）
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_enqueue_scripts',
	function () {
		$css_path = get_theme_file_path( 'assets/css/style.css' );
		$js_path  = get_theme_file_path( 'assets/js/main.js' );

		wp_enqueue_style(
			'kanzaki',
			get_theme_file_uri( 'assets/css/style.css' ),
			array(),
			file_exists( $css_path ) ? (string) filemtime( $css_path ) : '1.0.0'
		);

		// 静的版の <script defer> を再現（head内・defer）
		wp_enqueue_script(
			'kanzaki',
			get_theme_file_uri( 'assets/js/main.js' ),
			array(),
			file_exists( $js_path ) ? (string) filemtime( $js_path ) : '1.0.0',
			array(
				'strategy'  => 'defer',
				'in_footer' => false,
			)
		);
	}
);

/**
 * エディタ（iframe内キャンバス）にもビルド済みCSSを変換なしで読み込む。
 * add_editor_style だと @layer がセレクタ変換で壊れるため、この方式を採る。
 */
add_action(
	'enqueue_block_assets',
	function () {
		if ( ! is_admin() ) {
			return; // フロントは wp_enqueue_scripts 側で読み込み済み
		}
		$css_path = get_theme_file_path( 'assets/css/style.css' );
		wp_enqueue_style(
			'kanzaki-editor',
			get_theme_file_uri( 'assets/css/style.css' ),
			array(),
			file_exists( $css_path ) ? (string) filemtime( $css_path ) : '1.0.0'
		);
	}
);

/**
 * Google Fonts（静的版と同じ「media=print → onload で適用」の非同期読み込みパターン）。
 * wp_enqueue_style では onload 属性が付けられないため wp_head へ直書きする。
 */
add_action(
	'wp_head',
	function () {
		$fonts_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Noto+Sans+JP:wght@400;600;700&display=swap';
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="<?php echo esc_url( $fonts_url ); ?>" rel="stylesheet" media="print" onload="this.media='all'" />
		<noscript><link href="<?php echo esc_url( $fonts_url ); ?>" rel="stylesheet" /></noscript>
		<?php
	},
	5
);
