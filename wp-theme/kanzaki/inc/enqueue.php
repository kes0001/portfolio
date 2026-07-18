<?php
/**
 * アセット読み込み（CSS / JS / セルフホストフォント）
 *
 * パフォーマンス方針（PageSpeed対応）:
 * - テーマCSSは <link> ではなく wp_head へインライン出力し、
 *   render-blocking なCSS取得の往復を丸ごと無くす（FCP短縮）。
 * - CF7 のCSSも同様に小さいためインライン化して統合する。
 * - フォントは D-DIN（Regular/Bold・OFL 1.1）をセルフホストし preload。
 *   Google Fonts への外部依存は廃止（LCPのフォント再描画遅延対策）。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_enqueue_scripts',
	function () {
		$js_path = get_theme_file_path( 'assets/js/main.js' );

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

		// CF7 のCSS（約1KB）は下のインライン出力へ統合するため <link> を止める
		wp_dequeue_style( 'contact-form-7' );
		wp_deregister_style( 'contact-form-7' );
	},
	20
);

/**
 * フォント preload とテーマCSSのインライン出力。
 * 優先度2 = analytics(1) の直後・他の head 出力より前に置き、最初の描画に間に合わせる。
 */
add_action(
	'wp_head',
	function () {
		echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( 'assets/fonts/d-din-regular.woff2' ) ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
		echo '<link rel="preload" href="' . esc_url( get_theme_file_uri( 'assets/fonts/d-din-bold.woff2' ) ) . '" as="font" type="font/woff2" crossorigin>' . "\n";

		$css = '';

		// CF7 標準CSS（wp_enqueue_scripts 側で dequeue 済み）。
		// 無レイヤーのまま結合すると @layer 内の自作スタイル（_form.scss）に勝って
		// しまうため、最下位レイヤーに包む。テーマCSSより前に置くことで
		// vendor レイヤーが「最初に登場」＝カスケード最弱になる。
		$cf7_css = WP_PLUGIN_DIR . '/contact-form-7/includes/css/styles.css';
		if ( file_exists( $cf7_css ) ) {
			$css .= '@layer vendor{' . file_get_contents( $cf7_css ) . '}'; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		}

		$theme_css = get_theme_file_path( 'assets/css/style.css' );
		if ( file_exists( $theme_css ) ) {
			// インライン<style>では相対URLがページURL基準で解決されてしまうため、
			// ビルドCSS内の ../fonts/（スタイルシート基準の相対パス）を絶対URLへ書き換える
			$css .= str_replace(
				'../fonts/',
				esc_url( get_theme_file_uri( 'assets/fonts' ) ) . '/',
				file_get_contents( $theme_css ) // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			);
		}

		if ( '' !== $css ) {
			// Sassは非ASCIIを含む圧縮CSSの先頭にBOM(U+FEFF)を出力する。連結すると
			// BOMがシート途中に紛れ込み、CSSパーサが後続の @layer 順宣言と
			// reset層（kiso）を丸ごと無効トークンとして破棄してしまうため必ず剥ぐ。
			$css = str_replace( "\xEF\xBB\xBF", '', $css );
			echo '<style id="kanzaki-inline-css">' . $css . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	},
	2
);

/**
 * エディタ（iframe内キャンバス）にもビルド済みCSSを変換なしで読み込む。
 * add_editor_style だと @layer がセレクタ変換で壊れるため、この方式を採る。
 */
add_action(
	'enqueue_block_assets',
	function () {
		if ( ! is_admin() ) {
			return; // フロントは wp_head のインライン出力で読み込み済み
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
