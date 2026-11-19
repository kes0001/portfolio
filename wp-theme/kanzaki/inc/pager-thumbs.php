<?php
/**
 * 作品詳細の前後ナビ（post-navigation-link）にサムネイルと副題を足す。
 *
 * コアのブロックは「ラベル＋題のリンク」だけを出す。次の作品を画像で
 * 予告して回遊を促すため、表示時に隣の作品のアイキャッチと副題
 * （kanzaki_subtitle）を差し込む。DB・テンプレートのブロックは無変更。
 * 隣の作品の判定は adjacent-works.php（menu_order 準拠）がそのまま効く。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'render_block_core/post-navigation-link',
	function ( $block_content, $block ) {
		if ( '' === trim( (string) $block_content ) || ! is_singular( 'works' ) ) {
			return $block_content;
		}
		$is_previous = 'previous' === ( $block['attrs']['type'] ?? 'next' );
		$adjacent    = get_adjacent_post( false, '', $is_previous );
		if ( ! $adjacent ) {
			return $block_content;
		}

		// 画像は装飾（題のリンクが同じ行き先を名乗る）なので alt は空にする。
		$thumb = get_the_post_thumbnail(
			$adjacent,
			'medium',
			array(
				'alt'      => '',
				'loading'  => 'lazy',
				'decoding' => 'async',
			)
		);
		$note  = trim( (string) get_post_meta( $adjacent->ID, 'kanzaki_subtitle', true ) );

		if ( ! preg_match( '#^(<div[^>]*>)(.*)</div>\s*$#s', $block_content, $m ) ) {
			return $block_content;
		}

		$html = $m[1];
		if ( $thumb ) {
			$html .= '<span class="p-work__pager-thumb">' . $thumb . '</span>';
		}
		$html .= '<span class="p-work__pager-body">' . $m[2];
		if ( '' !== $note ) {
			$html .= '<span class="p-work__pager-note">' . esc_html( $note ) . '</span>';
		}
		$html .= '</span></div>';

		return $html;
	},
	10,
	2
);
