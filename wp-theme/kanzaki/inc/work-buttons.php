<?php
/**
 * 作品詳細のアクションボタン（公開サイト / デザインデータ）制御。
 *
 * ボタンURLは post-meta バインディングだが、
 * バインディングは値が空でもブロック自体は描画されてしまう。
 * フィールドの説明（「空欄でボタン非表示」）どおりに動くよう、
 * render_block でメタが空のときはブロックごと出力しない。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'render_block_core/button',
	function ( $block_content, $block ) {
		$button_meta = array(
			'kanzaki-external-button' => 'kanzaki_site_url',
			'kanzaki-figma-button'    => 'kanzaki_figma_url',
		);
		$class = $block['attrs']['className'] ?? '';
		foreach ( $button_meta as $button_class => $meta_key ) {
			if ( false === strpos( $class, $button_class ) ) {
				continue;
			}
			$url = get_post_meta( get_the_ID(), $meta_key, true );
			if ( '' === trim( (string) $url ) ) {
				return '';
			}
			return $block_content;
		}
		return $block_content;
	},
	10,
	2
);

/**
 * MacBookモックアップのフレーム画像制御。
 *
 * サイト作品（kanzaki_site_url あり）だけ実機フレームにはめ込む。
 * バナー・ロゴ等（site_url 空）はフレームを出さず、CSSの :has() が
 * 効かなくなることでサムネイルが素の表示に戻る。
 * URLを持たんサイト作品（カンプ集約ページ等）は kanzaki_device_frame で強制ON。
 */
add_filter(
	'render_block_core/html',
	function ( $block_content ) {
		if ( false === strpos( (string) $block_content, 'p-work__device-frame' ) ) {
			return $block_content;
		}
		$url   = get_post_meta( get_the_ID(), 'kanzaki_site_url', true );
		$force = get_post_meta( get_the_ID(), 'kanzaki_device_frame', true );
		if ( '' === trim( (string) $url ) && ! $force ) {
			return '';
		}
		return $block_content;
	}
);
