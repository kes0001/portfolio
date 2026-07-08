<?php
/**
 * SVGアイコンスプライトのインライン注入。
 *
 * テンプレート/パーツ（HTML）ではPHPが使えずスプライトの絶対URLを解決できないため、
 * body 直後にスプライト本体を1回だけ出力し、参照側は <use href="#id"> に統一する。
 * 外部SVG参照の同一オリジン制約も同時に回避できる。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'wp_body_open',
	function () {
		$sprite = get_theme_file_path( 'assets/images/icons.svg' );
		if ( ! file_exists( $sprite ) ) {
			return;
		}
		// 自テーマ同梱のスプライト（<symbol> 定義のみ）をそのまま出力する
		echo '<div hidden>' . file_get_contents( $sprite ) . '</div>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput, WordPress.WP.AlternativeFunctions
	}
);
