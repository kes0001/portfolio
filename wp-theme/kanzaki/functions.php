<?php
/**
 * KANZAKI Portfolio theme bootstrap.
 *
 * 実装は inc/ 配下に役割ごとに分割し、このファイルは読み込みだけを行う。
 *
 * @package kanzaki
 */

defined( 'ABSPATH' ) || exit;

require_once get_theme_file_path( 'inc/setup.php' );
require_once get_theme_file_path( 'inc/enqueue.php' );
require_once get_theme_file_path( 'inc/cpt-works.php' );
require_once get_theme_file_path( 'inc/adjacent-works.php' );
require_once get_theme_file_path( 'inc/metabox-works.php' );
require_once get_theme_file_path( 'inc/seo.php' );
