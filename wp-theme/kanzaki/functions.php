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
require_once get_theme_file_path( 'inc/shortcode-support.php' );
require_once get_theme_file_path( 'inc/cpt-works.php' );
require_once get_theme_file_path( 'inc/adjacent-works.php' );
require_once get_theme_file_path( 'inc/acf-works.php' );
require_once get_theme_file_path( 'inc/title-breaks.php' );
require_once get_theme_file_path( 'inc/work-buttons.php' );
require_once get_theme_file_path( 'inc/seo.php' );
require_once get_theme_file_path( 'inc/analytics.php' );
require_once get_theme_file_path( 'inc/cf7-tweaks.php' );
