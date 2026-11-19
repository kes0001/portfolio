<?php
/**
 * ヒーローのタイル並びに出す作品サムネイル（2列・ゆっくり縦に流れる）。
 *
 * ヒーローは core/html で保持しているため、パターン内の目印コメント
 * <!--kanzaki:hero-works--> を表示時に差し替える。
 *
 * 並べるのは、公開中の全作品のアイキャッチ（＝トップ一覧と同じサムネイル。全部 16:10・同じ大きさ）。
 * トップ一覧と同じ順（menu_order）で左の列から1枚ずつ配る。投稿IDを決め打ちしないので、
 * 作品を足したり並べ替えたりすればここも追従する。
 *
 * 列は2本。作品を左右に1枚ずつ配るので、同じ作品が両方の列に出ることはない。
 * 1列ぶん（作品の半数）の高さが見える範囲より長くなる大きさにしてあり、同じ作品が同時に2回見えることもない。
 *
 * 流れを切れ目なく繰り返すため、各列は同じ並びを3回くり返して出す（CSS が1回ぶんだけ送って巻き戻す）。
 * 2回目以降は見た目だけの複製なので、読み上げとタブ移動の対象から外す。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

/** 列の数（_top.scss の grid-template-columns と合わせる）。 */
const KANZAKI_HERO_TILE_COLUMNS = 2;

/** 各列で同じ並びをくり返す回数（_top.scss の送り量＝列の高さの 1/3 と合わせる）。 */
const KANZAKI_HERO_TILE_REPEAT = 3;

add_filter(
	'render_block_core/html',
	function ( $block_content ) {
		$marker = '<!--kanzaki:hero-works-->';
		if ( false === strpos( (string) $block_content, $marker ) ) {
			return $block_content;
		}

		$works = get_posts(
			array(
				'post_type'      => 'works',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => array(
					'menu_order' => 'ASC',
					'ID'         => 'ASC',
				),
				'meta_query'     => array(
					array(
						'key'     => '_thumbnail_id',
						'compare' => 'EXISTS',
					),
				),
			)
		);

		$tiles = array();
		foreach ( $works as $work ) {
			$tiles[] = array(
				'link'  => esc_url( get_permalink( $work ) ),
				'image' => wp_get_attachment_image(
					get_post_thumbnail_id( $work ),
					'medium_large',
					false,
					array(
						// リンクの名前になるので、画像の説明ではなく行き先（作品名）を入れる。
						'alt'      => wp_strip_all_tags( get_the_title( $work ) ),
						'sizes'    => '(min-width: 1264px) 360px, (min-width: 768px) 240px, 55vw',
						'loading'  => 'lazy',
						'decoding' => 'async',
					)
				),
			);
		}
		if ( ! $tiles ) {
			return str_replace( $marker, '', $block_content );
		}

		// 同じ並びを $repeat 回くり返した <ul> を作る。2回目以降は見た目だけの複製。
		$build_list = static function ( $class, $items, $repeat ) {
			$html = '<ul class="' . $class . '">';
			for ( $round = 0; $round < $repeat; $round++ ) {
				foreach ( $items as $tile ) {
					$html .= sprintf(
						'<li class="p-top-hero__work"%s><a class="p-top-hero__work-link" href="%s"%s>%s</a></li>',
						$round ? ' aria-hidden="true"' : '',
						$tile['link'],
						$round ? ' tabindex="-1"' : '',
						$tile['image']
					);
				}
			}
			return $html . '</ul>';
		};

		// 左の列から1枚ずつ配る。
		$html    = '';
		$columns = array_fill( 0, KANZAKI_HERO_TILE_COLUMNS, array() );
		foreach ( $tiles as $index => $tile ) {
			$columns[ $index % KANZAKI_HERO_TILE_COLUMNS ][] = $tile;
		}
		foreach ( $columns as $items ) {
			if ( $items ) {
				$html .= $build_list( 'p-top-hero__col', $items, KANZAKI_HERO_TILE_REPEAT );
			}
		}

		$html = '<div class="p-top-hero__works">' . $html . '</div>';

		return str_replace( $marker, $html, $block_content );
	}
);
