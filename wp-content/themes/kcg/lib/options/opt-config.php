<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = 'kcg';

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_title'           => esc_html__( 'Theme Options', 'kcg' ),
        'customizer'           => true,
		'dev_mode'             => 'true'
    );

    Redux::setArgs( $opt_name, $args );

	require KCG_THEMEROOT_DIR . '/lib/options/opt_general.php';
	require KCG_THEMEROOT_DIR . '/lib/options/opt_header.php';
    require KCG_THEMEROOT_DIR . '/lib/options/opt_about.php';
    require KCG_THEMEROOT_DIR . '/lib/options/opt_service.php';
    require KCG_THEMEROOT_DIR . '/lib/options/opt_pages.php';
	require KCG_THEMEROOT_DIR . '/lib/options/opt_footer.php';
