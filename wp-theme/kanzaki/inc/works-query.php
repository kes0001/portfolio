<?php
/**
 * トップの作品一覧を「メイン」と「その他の制作」に振り分ける。
 *
 * patterns/works-section.php の Query Loop は queryId 1（メイン）と
 * queryId 2（その他の制作）の2本。どちらも works を menu_order 順に引き、
 * ここで meta kanzaki_is_sub の有無で絞り込む。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'query_loop_block_query_vars',
	function ( $query, $block ) {
		if ( 'works' !== ( $query['post_type'] ?? '' ) ) {
			return $query;
		}

		$query_id = (int) ( $block->context['queryId'] ?? 0 );

		if ( 1 === $query_id ) {
			$query['meta_query'] = array(
				'relation' => 'OR',
				array(
					'key'     => 'kanzaki_is_sub',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'   => 'kanzaki_is_sub',
					'value' => '1',
					'compare' => '!=',
				),
			);
		} elseif ( 2 === $query_id ) {
			$query['meta_query'] = array(
				array(
					'key'   => 'kanzaki_is_sub',
					'value' => '1',
				),
			);
		}

		return $query;
	},
	10,
	2
);
