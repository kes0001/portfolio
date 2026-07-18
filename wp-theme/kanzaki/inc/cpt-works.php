<?php
/**
 * カスタム投稿タイプ「works」とカスタムフィールドの登録。
 *
 * メタは Block Bindings（core/post-meta）でテンプレートに表示するため、
 * すべて show_in_rest / single / sanitize_callback 付きで登録する。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'init',
	function () {
		register_post_type(
			'works',
			array(
				'labels'       => array(
					'name'          => '作品',
					'singular_name' => '作品',
					'add_new'       => '作品を追加',
					'add_new_item'  => '作品を追加',
					'edit_item'     => '作品を編集',
					'all_items'     => '作品一覧',
				),
				'public'       => true,
				'has_archive'  => false, // 一覧はトップの Query Loop に集約（現サイト踏襲）
				'rewrite'      => array(
					'slug'       => 'works',
					'with_front' => false,
				),
				'menu_icon'    => 'dashicons-portfolio',
				'menu_position' => 5,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
				'show_in_rest' => true,
				// 新規作品のひな形（PURPOSE / DESIGN / CODING）。既存作品と同じ
				// 「セクションgroup > 英ラベル + 見出し + 本文」の構造で用意する
				'template'     => array(
					array(
						'core/group',
						array(
							'className' => 'p-work__section',
							'layout'    => array( 'type' => 'default' ),
						),
						array(
							array( 'core/paragraph', array( 'className' => 'p-work__section-title-en', 'content' => 'PURPOSE' ) ),
							array( 'core/heading', array( 'level' => 2, 'className' => 'p-work__section-title', 'placeholder' => '制作の目的' ) ),
							array( 'core/paragraph', array( 'className' => 'p-work__text', 'placeholder' => '目的・ターゲット・ゴールを書く' ) ),
						),
					),
					array(
						'core/group',
						array(
							'className' => 'p-work__section',
							'layout'    => array( 'type' => 'default' ),
						),
						array(
							array( 'core/paragraph', array( 'className' => 'p-work__section-title-en', 'content' => 'DESIGN' ) ),
							array( 'core/heading', array( 'level' => 2, 'className' => 'p-work__section-title', 'placeholder' => 'デザインの工夫' ) ),
							array( 'core/paragraph', array( 'className' => 'p-work__text', 'placeholder' => 'レイアウト・配色・導線の意図を書く' ) ),
						),
					),
					array(
						'core/group',
						array(
							'className' => 'p-work__section',
							'layout'    => array( 'type' => 'default' ),
						),
						array(
							array( 'core/paragraph', array( 'className' => 'p-work__section-title-en', 'content' => 'CODING' ) ),
							array( 'core/heading', array( 'level' => 2, 'className' => 'p-work__section-title', 'placeholder' => 'コーディングの工夫' ) ),
							array( 'core/paragraph', array( 'className' => 'p-work__text', 'placeholder' => '実装面の工夫を書く' ) ),
						),
					),
				),
			)
		);

		$string_meta = array(
			'kanzaki_subtitle'  => 'タイトル補足（例: リラクゼーションサロンLP）',
			'kanzaki_eyebrow'   => 'ページ冒頭ラベル（例: Works — LP Design（実案件））',
			'kanzaki_category'  => 'カテゴリラベル（DESIGN / CODING）',
			'kanzaki_role'      => '担当範囲（ROLE）',
			'kanzaki_tools'     => '使用ツール（TOOLS）',
			'kanzaki_highlight' => '工夫（カード用サマリー）',
			'kanzaki_badge'     => 'バッジ文言（例: 実案件。空欄で非表示）',
		);

		foreach ( $string_meta as $key => $description ) {
			register_post_meta(
				'works',
				$key,
				array(
					'type'              => 'string',
					'single'            => true,
					'default'           => '',
					'description'       => $description,
					'show_in_rest'      => true,
					'sanitize_callback' => 'sanitize_text_field',
					'auth_callback'     => function () {
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}

		register_post_meta(
			'works',
			'kanzaki_site_url',
			array(
				'type'              => 'string',
				'single'            => true,
				'default'           => '',
				'description'       => '公開サイト / デモのURL（空欄でボタン非表示）',
				'show_in_rest'      => true,
				'sanitize_callback' => 'esc_url_raw',
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			'works',
			'kanzaki_figma_url',
			array(
				'type'              => 'string',
				'single'            => true,
				'default'           => '',
				'description'       => 'Figmaデザインデータの共有URL（空欄でボタン非表示）',
				'show_in_rest'      => true,
				'sanitize_callback' => 'esc_url_raw',
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);

		register_post_meta(
			'works',
			'kanzaki_device_frame',
			array(
				'type'              => 'boolean',
				'single'            => true,
				'default'           => false,
				'description'       => 'サイトURLが空の作品でもMacBookフレームに嵌める（カンプ集約ページ等）',
				'show_in_rest'      => true,
				'sanitize_callback' => 'rest_sanitize_boolean',
				'auth_callback'     => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
);
