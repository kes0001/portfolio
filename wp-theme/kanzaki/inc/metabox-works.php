<?php
/**
 * 作品（works）のカスタムフィールド入力用メタボックス。
 *
 * 出力は Block Bindings（テンプレート側）が担い、ここは入力UIのみ。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

const KANZAKI_WORKS_NONCE = 'kanzaki_works_meta_nonce';

/**
 * 入力フィールドの定義（キー => [ラベル, 入力タイプ]）
 */
function kanzaki_works_meta_fields() {
	return array(
		'kanzaki_subtitle'  => array( 'タイトル補足', 'text', '例: リラクゼーションサロンLP' ),
		'kanzaki_eyebrow'   => array( '冒頭ラベル（eyebrow）', 'text', '例: Works — LP Design（実案件）' ),
		'kanzaki_category'  => array( 'カテゴリラベル', 'select', array( 'DESIGN', 'WEB DESIGN', 'CODING' ) ),
		'kanzaki_role'      => array( '担当範囲（ROLE）', 'text', '例: デザイン（Figma）' ),
		'kanzaki_tools'     => array( '使用ツール（TOOLS）', 'text', '例: Figma / Photoshop' ),
		'kanzaki_highlight' => array( '工夫（カード用サマリー）', 'text', '例: auto-layoutベースの、実装しやすいデザインデータ設計' ),
		'kanzaki_site_url'  => array( '公開サイト / デモURL', 'url', '空欄でボタン非表示' ),
		'kanzaki_badge'     => array( 'バッジ文言', 'text', '例: 実案件（空欄で非表示）' ),
	);
}

add_action(
	'add_meta_boxes',
	function () {
		add_meta_box(
			'kanzaki-works-meta',
			'作品情報（カード・詳細ページに表示）',
			'kanzaki_works_meta_box_render',
			'works',
			'normal',
			'high'
		);
	}
);

/**
 * メタボックスの描画
 *
 * @param WP_Post $post 編集中の投稿。
 */
function kanzaki_works_meta_box_render( $post ) {
	wp_nonce_field( KANZAKI_WORKS_NONCE, KANZAKI_WORKS_NONCE );
	echo '<table class="form-table"><tbody>';
	foreach ( kanzaki_works_meta_fields() as $key => list( $label, $type, $hint ) ) {
		$value = get_post_meta( $post->ID, $key, true );
		echo '<tr><th scope="row"><label for="' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label></th><td>';
		if ( 'select' === $type ) {
			echo '<select id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '">';
			echo '<option value="">—</option>';
			foreach ( $hint as $option ) {
				printf(
					'<option value="%1$s"%2$s>%1$s</option>',
					esc_attr( $option ),
					selected( $value, $option, false )
				);
			}
			echo '</select>';
		} else {
			printf(
				'<input type="%1$s" class="large-text" id="%2$s" name="%2$s" value="%3$s" placeholder="%4$s" />',
				esc_attr( 'url' === $type ? 'url' : 'text' ),
				esc_attr( $key ),
				esc_attr( $value ),
				esc_attr( is_string( $hint ) ? $hint : '' )
			);
		}
		echo '</td></tr>';
	}
	echo '</tbody></table>';
	echo '<p class="description">リード文は「抜粋」欄、サムネイルは「アイキャッチ画像」、掲載順はサイドバーの「順序」を使います。</p>';
}

add_action(
	'save_post_works',
	function ( $post_id ) {
		if ( ! isset( $_POST[ KANZAKI_WORKS_NONCE ] ) || ! wp_verify_nonce( sanitize_key( $_POST[ KANZAKI_WORKS_NONCE ] ), KANZAKI_WORKS_NONCE ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		foreach ( kanzaki_works_meta_fields() as $key => list( , $type ) ) {
			if ( ! isset( $_POST[ $key ] ) ) {
				continue;
			}
			$raw = wp_unslash( $_POST[ $key ] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
			$value = 'url' === $type ? esc_url_raw( $raw ) : sanitize_text_field( $raw );
			update_post_meta( $post_id, $key, $value );
		}
	}
);
