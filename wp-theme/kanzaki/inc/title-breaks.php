<?php
/**
 * 作品タイトルの折り返し位置ヒント（表示時のみ）。
 *
 * c-card__title / p-work__title は word-break: keep-all（語境界でのみ折返し）
 * のため、語境界が無い長いタイトルにはゼロ幅スペース（U+200B）を表示時に
 * 挿入して「ライトディレク/ション」のような語中切りを防ぐ。
 *
 * the_title フィルタ＝post-title ブロック等の本文表示のみが対象。
 * <title> タグ（wp_get_document_title）やRSSは通らないため汚れない。
 * DBのタイトルは素のまま（RESTのサニタイズがU+200Bを剥がすため保存では持てない）。
 *
 * 新しい作品でタイトルが変な位置で折れたら、この辞書に語境界を追記する。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'the_title',
	function ( $title, $post_id = 0 ) {
		if ( 'works' !== get_post_type( $post_id ) ) {
			return $title;
		}
		$zwsp   = "\u{200B}";
		$breaks = array(
			'株式会社ライトディレクション' => '株式会社' . $zwsp . 'ライトディレクション',
			'Bootstrapを使用したサイト制作' => 'Bootstrapを' . $zwsp . '使用した' . $zwsp . 'サイト制作',
			'笹塚スマイルクリニック'       => '笹塚' . $zwsp . 'スマイルクリニック',
			'津堅島シークルーズ'           => '津堅島' . $zwsp . 'シークルーズ',
		);
		return strtr( $title, $breaks );
	},
	10,
	2
);
