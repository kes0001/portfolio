<?php
/**
 * Contact Form 7 まわりの小さな調整。
 *
 * ハニーポット（スパム対策の隠しフィールド）が正の tabindex（実測: 1000）を
 * 出力し、Lighthouse の a11y 監査（tabindex > 0 禁止）で減点される。
 * 隠しフィールドはフォーカス順に入れない方が正しいため -1 に置き換える。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'wpcf7_form_elements',
	function ( $content ) {
		return preg_replace( '/tabindex="[1-9]\d*"/', 'tabindex="-1"', $content );
	}
);
