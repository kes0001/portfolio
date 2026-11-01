<?php
/**
 * 作品（works）のカスタムフィールド定義（ACF）。
 *
 * 入力UIのみACFに任せる。フィールド name は register_post_meta 済みの
 * kanzaki_* をそのまま使うため、保存先メタキー・Block Bindings・REST は
 * 旧メタボックス時代から一切変わらない。
 * フィールドグループはコード管理（この1ファイル）。ACF管理画面では編集しない。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'acf/init',
	function () {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group(
			array(
				'key'      => 'group_kanzaki_works',
				'title'    => '作品情報（カード・詳細ページに表示）',
				'location' => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'works',
						),
					),
				),
				'position' => 'normal',
				'style'    => 'default',
				'fields'   => array(

					// ---- タブ：基本 ----
					array(
						'key'   => 'field_kanzaki_tab_basic',
						'label' => '基本',
						'type'  => 'tab',
					),
					array(
						'key'          => 'field_kanzaki_subtitle',
						'name'         => 'kanzaki_subtitle',
						'label'        => 'タイトル補足',
						'type'         => 'text',
						'instructions' => 'タイトル横に小さく出る補足。例: リラクゼーションサロンLP',
						'placeholder'  => '例: リラクゼーションサロンLP',
					),
					// 分類はWP標準の「カテゴリー」欄に一本化した（単一選択のselectでは
					// デザインとコーディングを兼任した作品を表現できんかったため）。
					array(
						'key'          => 'field_kanzaki_badge',
						'name'         => 'kanzaki_badge',
						'label'        => 'バッジ文言',
						'type'         => 'text',
						'instructions' => 'サムネイル左上のバッジ。例: 実案件（空欄で非表示）',
						'placeholder'  => '例: 実案件',
					),

					// ---- タブ：カード表示 ----
					array(
						'key'   => 'field_kanzaki_tab_card',
						'label' => 'カード表示',
						'type'  => 'tab',
					),
					array(
						'key'          => 'field_kanzaki_highlight',
						'name'         => 'kanzaki_highlight',
						'label'        => '工夫（サマリー）',
						'type'         => 'text',
						'instructions' => '作品の工夫を要約した1文。※現在カードには表示していない（データ保持のみ。カードは担当範囲まで）',
						'placeholder'  => '例: auto-layoutベースの、実装しやすいデザインデータ設計',
					),

					// ---- タブ：詳細ページ ----
					array(
						'key'   => 'field_kanzaki_tab_detail',
						'label' => '詳細ページ',
						'type'  => 'tab',
					),
					array(
						'key'          => 'field_kanzaki_eyebrow',
						'name'         => 'kanzaki_eyebrow',
						'label'        => '冒頭ラベル（eyebrow）',
						'type'         => 'text',
						'instructions' => '詳細ページのタイトル上の小ラベル。例: Works — LP Design（実案件）',
						'placeholder'  => '例: Works — LP Design（実案件）',
					),
					array(
						'key'          => 'field_kanzaki_role',
						'name'         => 'kanzaki_role',
						'label'        => '担当範囲（ROLE）',
						'type'         => 'text',
						'instructions' => '例: デザイン（Figma）',
						'placeholder'  => '例: デザイン（Figma）',
					),
					array(
						'key'          => 'field_kanzaki_tools',
						'name'         => 'kanzaki_tools',
						'label'        => '使用ツール（TOOLS）',
						'type'         => 'text',
						'instructions' => '例: Figma / Photoshop',
						'placeholder'  => '例: Figma / Photoshop',
					),
					array(
						'key'          => 'field_kanzaki_site_url',
						'name'         => 'kanzaki_site_url',
						// url型はデモの相対パス（/demo/〜）を検証エラーにするため text で持つ
						'type'         => 'text',
						'label'        => '公開サイト / デモURL',
						'instructions' => '外部サイトは https://〜、同サーバーのデモは /demo/〜 の相対パス。空欄で「公開サイトを見る」ボタン非表示。',
						'placeholder'  => 'https://example.com/ または /demo/xxx/index.html',
					),
					array(
						'key'          => 'field_kanzaki_figma_url',
						'name'         => 'kanzaki_figma_url',
						// site_url と揃えて text で持つ（保存は esc_url_raw でサニタイズ）
						'type'         => 'text',
						'label'        => 'FigmaデザインデータURL',
						'instructions' => 'Figmaの共有URL。空欄で「デザインデータを見る」ボタン非表示。共有設定は「リンクを知っている全員が閲覧可」にすること。',
						'placeholder'  => 'https://www.figma.com/design/...',
					),
					array(
						'key'          => 'field_kanzaki_device_frame',
						'name'         => 'kanzaki_device_frame',
						'type'         => 'true_false',
						'label'        => 'MacBookフレームを強制表示',
						'instructions' => '通常は「公開サイト/デモURL」がある作品だけフレームに嵌まる。URLが空のサイト作品（カンプ集約ページ等）でフレームを出したいときだけON。',
						'ui'           => 1,
					),
					array(
						'key'          => 'field_kanzaki_no_device_frame',
						'name'         => 'kanzaki_no_device_frame',
						'type'         => 'true_false',
						'label'        => 'MacBookフレームを外す',
						'instructions' => 'URLがあってもフレームに嵌めず、画像をそのまま見せる（スマホ専用LPなど、PCの画面に合わん作品）。',
						'ui'           => 1,
					),
					array(
						'key'          => 'field_kanzaki_is_sub',
						'name'         => 'kanzaki_is_sub',
						'type'         => 'true_false',
						'label'        => '「その他の制作」に表示',
						'instructions' => 'ONにするとトップのメイン一覧から外れ、下の「その他の制作」に並ぶ（練習作品・バナー・ロゴなど）。',
						'ui'           => 1,
					),

					// ---- 共通の案内 ----
					array(
						'key'     => 'field_kanzaki_works_note',
						'label'   => '',
						'type'    => 'message',
						'message' => 'リード文は「抜粋」欄、サムネイルは「アイキャッチ画像」、掲載順はサイドバーの「順序」を使います。',
					),
				),
			)
		);
	}
);
