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
		add_theme_support( 'editor-styles' );

		// エディタ iframe にもビルド済みCSSを読み込む
		// （theme.json のパレットが参照する --color-* トークンの定義元。
		//   @layer の変換に問題が出た場合は enqueue_block_assets 方式へ切替）
		add_editor_style( 'assets/css/style.css' );

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
