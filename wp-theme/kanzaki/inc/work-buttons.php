<?php
/**
 * 作品詳細の「公開サイトを見る」ボタン制御。
 *
 * ボタンURLは post-meta バインディング（kanzaki_site_url）だが、
 * バインディングは値が空でもブロック自体は描画されてしまう。
 * metabox の説明（「空欄でボタン非表示」）どおりに動くよう、
 * render_block でメタが空のときはブロックごと出力しない。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'render_block_core/button',
	function ( $block_content, $block ) {
		$class = $block['attrs']['className'] ?? '';
		if ( false === strpos( $class, 'kanzaki-external-button' ) ) {
			return $block_content;
		}
		$url = get_post_meta( get_the_ID(), 'kanzaki_site_url', true );
		if ( '' === trim( (string) $url ) ) {
			return '';
		}
		return $block_content;
	},
	10,
	2
);
