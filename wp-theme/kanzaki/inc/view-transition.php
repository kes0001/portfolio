<?php
/**
 * 作品の画像に View Transition 名を付ける（一覧カード → 詳細ページのつながり）。
 *
 * 一覧カードと single の post-featured-image に、作品ごとに同じ
 * view-transition-name（work-<投稿ID>）を付ける。遷移の有効化と尺は
 * CSS（scss/pages/_motion.scss の @view-transition）が担当する。
 * スラッグは日本語だと識別子として使えないため投稿IDを使う。
 * 静的版は index.html / works/*.html にファイル名ベースで直書きしている。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'render_block_core/post-featured-image',
	function ( $block_content, $block, $instance ) {
		$post_id = $instance->context['postId'] ?? get_the_ID();
		if ( ! $post_id || 'works' !== get_post_type( $post_id ) ) {
			return $block_content;
		}

		$tags = new WP_HTML_Tag_Processor( $block_content );
		if ( $tags->next_tag( 'img' ) ) {
			$style = (string) $tags->get_attribute( 'style' );
			$tags->set_attribute( 'style', trim( $style . ' view-transition-name: work-' . (int) $post_id . ';' ) );
		}
		return $tags->get_updated_html();
	},
	10,
	3
);
