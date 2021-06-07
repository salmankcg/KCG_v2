<?php
namespace KC_GLOBAL;

use \KC_GLOBAL\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Enqueue{

	protected static $utils = null;

    public function __construct(){
        $this->init_hooks();
    }

    public function init_hooks(){
		// add_action( 'wp_enqueue_scripts', [ $this, 'kcg__addons_style' ] );
		// add_action( 'wp_enqueue_scripts', [ $this, 'kcg__addons_script' ] );
        //add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'kcg__addons_style' ) );
        //add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'kcg__addons_script' ) );

       //add_action('wp_enqueue_scripts', [__CLASS__, 'kcg_addons_frontend_scripts']);
    }

    public static function get_utils_data() {
        if ( is_null( self::$utils ) ) {
            self::$utils = new Utils();
        }

        return self::$utils;
    }
    public function kcg__addons_style()
    {
        $utils = self::get_utils_data();
        // wp_enqueue_style(
        //     'kcg-frontend',
        //     $utils->kcg__plugin_url('/assets/widgets/css/kcg-frontend.css'),
        //     [],
        //     Utils::kcg__version()
        // );
        do_action( 'kcg-dashboard/after-enqueue-style', $this );
    }
    public function kcg__addons_script()
    {
        $utils = self::get_utils_data();
        
        wp_enqueue_script(
            'kcg-frontend',
            $utils->kcg__plugin_url('/assets/js/kcg-frontend.js'),
            ['jquery','elementor-frontend'],
            Utils::kcg__version(),
            true
        );
        wp_localize_script(
            'kcg-frontend',
            'kcgConfig',
            apply_filters( 'kcg-dashboard/kcg-editor-config',
                array(
                	'ajaxurl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
                    'nonce'	=> wp_create_nonce( 'kcg-tab-nonce' ),
                )
            )
        );
        do_action( 'kcg-dashboard/after-enqueue-script', $this );
    }
   
}