<?php
/**
 * 自作の Block Bindings ソース。
 *
 * 作品カードの分類表示に使う。core/post-terms を使わないのは、あれが各タームを
 * カテゴリーアーカイブへのリンクにするため——カード内のリンクは「詳細を見る」1本に
 * 保ちたい（タブストップを増やさず、整備していないアーカイブページも露出させない）。
 * ここでは純テキストだけを返し、カードのマークアップは段落のまま変えない。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

/**
 * 表示順を固定するスラッグの並び。
 *
 * wp_get_object_terms の既定 orderby は name で、UTF-8順だと「コーディング」が
 * 「デザイン」より前に来てしまう。担当の入口はデザインなので、ここで明示的に固定する。
 * この配列に無いタームは末尾へ回し、名前順で並べる。
 */
const KANZAKI_TERM_ORDER = array( 'design', 'coding' );

/**
 * カード用の分類テキストを組み立てる。
 *
 * @param array    $source_args ブロック側から渡る引数（taxonomy / separator）。
 * @param WP_Block $block_instance ブロックインスタンス。
 * @return string 「デザイン / コーディング」のような文字列。該当なしは空文字。
 */
function kanzaki_render_terms_binding( $source_args, $block_instance ) {
	$post_id = $block_instance->context['postId'] ?? get_the_ID();
	if ( ! $post_id ) {
		return '';
	}

	$taxonomy  = $source_args['taxonomy'] ?? 'category';
	$separator = $source_args['separator'] ?? ' / ';

	$terms = get_the_terms( $post_id, $taxonomy );
	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return '';
	}

	usort(
		$terms,
		static function ( $a, $b ) {
			$ia = array_search( $a->slug, KANZAKI_TERM_ORDER, true );
			$ib = array_search( $b->slug, KANZAKI_TERM_ORDER, true );

			// 並びの指定が無いものは末尾へ送り、その中では名前順にする。
			$ia = ( false === $ia ) ? PHP_INT_MAX : $ia;
			$ib = ( false === $ib ) ? PHP_INT_MAX : $ib;

			return ( $ia === $ib ) ? strcmp( $a->name, $b->name ) : $ia <=> $ib;
		}
	);

	return implode( $separator, wp_list_pluck( $terms, 'name' ) );
}

/**
 * ソースを登録する。
 */
function kanzaki_register_block_bindings() {
	register_block_bindings_source(
		'kanzaki/terms',
		array(
			'label'              => __( '分類（タクソノミー）', 'kanzaki' ),
			'get_value_callback' => 'kanzaki_render_terms_binding',
			'uses_context'       => array( 'postId' ),
		)
	);
}
add_action( 'init', 'kanzaki_register_block_bindings' );
