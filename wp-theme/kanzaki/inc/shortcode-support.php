<?php
/**
 * ブロックテンプレート内のショートコード対応。
 *
 * WPコアの core/shortcode ブロックは render_block_core_shortcode() が
 * wpautop() を掛けるだけで、実際の展開は the_content フィルタ（do_shortcode）に依存する。
 * FSE のテンプレート／パターンは the_content を経由せず do_blocks で描画されるため、
 * そのままではショートコードが生テキストのまま残る（例: Contact Form 7 の [contact-form-7 ...]）。
 *
 * ここで描画時（do_blocks 実行時）に core/shortcode ブロックへ do_shortcode を適用する。
 * リクエストごとに実行されるため、CF7 の nonce や unit-tag も毎回新しく生成される。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'render_block',
	function ( $block_content, $block ) {
		if ( isset( $block['blockName'] ) && 'core/shortcode' === $block['blockName'] ) {
			return do_shortcode( $block_content );
		}
		return $block_content;
	},
	10,
	2
);
