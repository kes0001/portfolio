<?php
/**
 * 作品カードの分類・バッジ段落をピル（span）に変換する。
 *
 * カード内の分類は Block Bindings（kanzaki/terms）が「デザイン / コーディング」の
 * 純テキストを段落へ流し込む。表示はタームごとのピルにしたいが、バインディングの
 * 値に HTML は入れられんので、表示側（render_block）で段落を span の並びへ
 * 書き換える。DB とエディター上の段落はそのまま＝静的版 index.html と同じ
 * `.c-card__tag` のマークアップになる。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

/**
 * 段落の中身（<p ...>と</p>の内側）を取り出す。
 *
 * @param string $html 段落ブロックの出力。
 * @return string|null 中身。段落でなければ null。
 */
function kanzaki_card_paragraph_inner( $html ) {
	if ( ! preg_match( '#^\s*<p[^>]*>(.*)</p>\s*$#s', $html, $m ) ) {
		return null;
	}
	return trim( $m[1] );
}

/**
 * c-card__category / c-card__badge 段落をピルへ変換する。
 *
 * @param string $block_content ブロックの出力 HTML。
 * @param array  $block         パース済みブロック。
 * @return string
 */
function kanzaki_card_tags_render( $block_content, $block ) {
	$class = $block['attrs']['className'] ?? '';
	if ( '' === $class ) {
		return $block_content;
	}

	$is_category = false !== strpos( $class, 'c-card__category' );
	$is_badge    = false !== strpos( $class, 'c-card__badge' );
	if ( ! $is_category && ! $is_badge ) {
		return $block_content;
	}

	$inner = kanzaki_card_paragraph_inner( $block_content );
	if ( null === $inner ) {
		return $block_content;
	}

	$text = trim( wp_strip_all_tags( $inner ) );
	if ( '' === $text ) {
		return ''; // 空（バッジ無し・分類無し）は要素ごと出さない
	}

	if ( $is_badge ) {
		return '<span class="c-card__tag c-card__tag--badge">' . esc_html( $text ) . '</span>';
	}

	$out = '';
	foreach ( preg_split( '#\s*/\s*#u', $text ) as $term ) {
		if ( '' === $term ) {
			continue;
		}
		$out .= '<span class="c-card__tag">' . esc_html( $term ) . '</span>';
	}
	return $out;
}
add_filter( 'render_block_core/paragraph', 'kanzaki_card_tags_render', 10, 2 );
