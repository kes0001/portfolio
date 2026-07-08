<?php
/**
 * works の前後ナビ（post-navigation-link）を menu_order 準拠にする。
 *
 * WPの隣接投稿はデフォルトで post_date 基準のため、トップの一覧
 * （Query Loop: menu_order 昇順）と順序が食い違う。ここで works に限り
 * menu_order（同値は ID）で前後を判定し、新規作品追加時に投稿日を
 * 並び順と揃える運用ルールを不要にする。
 *
 * PREV = menu_order が小さい側 / NEXT = 大きい側（一覧の並びと一致）。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'get_previous_post_where',
	function ( $where, $in_same_term, $excluded_terms, $taxonomy, $post ) {
		if ( ! $post || 'works' !== $post->post_type ) {
			return $where;
		}
		global $wpdb;
		return $wpdb->prepare(
			"WHERE ( p.menu_order < %d OR ( p.menu_order = %d AND p.ID < %d ) ) AND p.post_type = 'works' AND p.post_status = 'publish'",
			$post->menu_order,
			$post->menu_order,
			$post->ID
		);
	},
	10,
	5
);

add_filter(
	'get_previous_post_sort',
	function ( $sort, $post ) {
		if ( ! $post || 'works' !== $post->post_type ) {
			return $sort;
		}
		return 'ORDER BY p.menu_order DESC, p.ID DESC LIMIT 1';
	},
	10,
	2
);

add_filter(
	'get_next_post_where',
	function ( $where, $in_same_term, $excluded_terms, $taxonomy, $post ) {
		if ( ! $post || 'works' !== $post->post_type ) {
			return $where;
		}
		global $wpdb;
		return $wpdb->prepare(
			"WHERE ( p.menu_order > %d OR ( p.menu_order = %d AND p.ID > %d ) ) AND p.post_type = 'works' AND p.post_status = 'publish'",
			$post->menu_order,
			$post->menu_order,
			$post->ID
		);
	},
	10,
	5
);

add_filter(
	'get_next_post_sort',
	function ( $sort, $post ) {
		if ( ! $post || 'works' !== $post->post_type ) {
			return $sort;
		}
		return 'ORDER BY p.menu_order ASC, p.ID ASC LIMIT 1';
	},
	10,
	2
);
