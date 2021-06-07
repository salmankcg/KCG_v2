<?php
/**
 * kcg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kcg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! defined( 'KCG_VERSION' ) ) {
	define( 'KCG_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! defined( 'KCG_THEMEROOT' ) ) {
	define( 'KCG_THEMEROOT', get_template_directory_uri());
}

if ( ! defined( 'KCG_THEMEROOT_DIR' ) ) {
	define( 'KCG_THEMEROOT_DIR', get_template_directory());
}

if ( ! defined( 'KCG_IMAGES' ) ) {
	define( 'KCG_IMAGES', KCG_THEMEROOT.'/assets/img');
}

if ( ! defined( 'KCG_ASSETS' ) ) {
	define( 'KCG_ASSETS', KCG_THEMEROOT.'/assets');
}

if ( ! defined( 'KCG_CSS' ) ) {
	define( 'KCG_CSS', KCG_THEMEROOT.'/assets/css');
}

if ( ! defined( 'KCG_JS' ) ) {
	define( 'KCG_JS', KCG_THEMEROOT.'/assets/js');
}

if ( ! defined( 'KCG_VENDOR' ) ) {
	define( 'KCG_VENDOR', KCG_THEMEROOT.'/assets/vendors');
}


if ( ! function_exists( 'kcg_setup' ) ) :
	function kcg_setup() {
		
		load_theme_textdomain( 'kcg', get_template_directory() . '/languages' );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'primary_left' => esc_html__( 'Primary Left Menu', 'kcg' ),
				'primary_right' => esc_html__( 'Primary Right Menu', 'kcg' ),
				//'about_menu' => esc_html__( 'About Page Menu', 'kcg' ),
				'footer_menu' => esc_html__( 'Footer Menu', 'kcg' ),
			)
		);
		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support(
			'custom-background',
			apply_filters(
				'kcg_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_image_size( 'team_grid', 553, 700 );
		add_image_size( 'blog_front', 384, 320 );
		add_image_size( 'blog_single', 768, 496 );
	}
endif;
add_action( 'after_setup_theme', 'kcg_setup' );

function kcg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kcg_content_width', 640 );
}
add_action( 'after_setup_theme', 'kcg_content_width', 0 );

require_once KCG_THEMEROOT_DIR . '/inc/init.php'; 
require_once KCG_THEMEROOT_DIR . '/lib/init.php'; 