<?php
/**
 * テーマセットアップ（supports・画像サイズ・パターンカテゴリ・エディタスタイル）
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'post-thumbnails' );

		// エディタCSSは add_editor_style ではなく enqueue_block_assets（inc/enqueue.php）で読み込む。
		// add_editor_style のセレクタ変換が @layer 構造を壊し、
		// トークン・ボタン等のスタイルがエディタに届かなくなるため。

		// works カード用の中間サイズ（16:10）
		add_image_size( 'kanzaki-card', 640, 400, true );
	}
);

add_action(
	'init',
	function () {
		register_block_pattern_category(
			'kanzaki',
			array( 'label' => 'KANZAKI Portfolio' )
		);
	}
);
