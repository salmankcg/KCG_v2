<?php 
/**
 * @package kcg
 *
 */
namespace KC_GLOBAL;
use \KC_GLOBAL\Utils;
use \KC_GLOBAL\Dashboard;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Admin_Enqueue{

	protected $plugin_name;

    public $utils;

    protected static $dashboard_data = null;

    protected $assets_enqueued = false;

    public function __construct(){
    	$this->kcg_admin_init();
    }
    protected function kcg_admin_init()
    {
    	$this->utils = new Utils;
        add_action( 'admin_enqueue_scripts', [ $this, 'kcg__menu_style' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_dashboard_assets' ] );
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'kcg__editor_assets']);
    }
    public static function get_dashboard_data() {
        if ( is_null( self::$dashboard_data ) ) {
            self::$dashboard_data = new Dashboard();
        }

        return self::$dashboard_data;
    }
    public function enqueue_dashboard_assets() {
        $dashboard_data = self::get_dashboard_data();
    	 if ( ! $dashboard_data->is_dashboard_page() ) {
            return false;
        }

        if ( $this->assets_enqueued ) {
            return false;
        }

        $this->kcg__enqueue_assets();

        $this->assets_enqueued = true;
    }
    
    public function kcg__enqueue_assets()
    {
        $dashboard_data = self::get_dashboard_data();
        wp_enqueue_style(
            'kcg-lite-dashboard-css',
            $this->utils->kcg__plugin_url('/assets/admin/css/kcg-dashboard.min.css'),
            false,
            Utils::kcg__version()
        );

        wp_enqueue_script(
            'kcg-lite-dashboard-script',
            $this->utils->kcg__plugin_url('/assets/admin/js/kcg-dashboard.js'),
            ['jquery'],
            Utils::kcg__version(),
            true
        );
        wp_localize_script(
            'kcg-lite-dashboard-script',
            'KCGDashboardConfig',
            apply_filters( 'kcg-dashboard/js-page-config',
                array(
                    'pageModule'           => false,
                    'subPageModule'        => false,
                    'kcg_ajax'      => esc_url( admin_url( 'admin-ajax.php' ) ),
                    'kcg_nonce'     => wp_create_nonce( 'kcgs_nonce' ),
                ),
                $dashboard_data->kcg_get_page()
            )
        );
        do_action( 'kcg-dashboard/after-enqueue-assets', $this, $dashboard_data->kcg_get_page() );
    }
    public function kcg__editor_assets()
    {
        wp_enqueue_style(
            'kcg-editor-css',
            $this->utils->kcg__plugin_url('/assets/admin/css/kcg-editor.css'),
            false,
            Utils::kcg__version()
        );
    }
    public static function kcg__menu_style() {
        ?>
        <style>
            #toplevel_page_kcg a.toplevel_page_kcg{
                background: -webkit-linear-gradient(4.95deg, #d7ad64 6.33%, #f7d18f 102.21%) !important;
                background: linear-gradient(85.05deg, #d7ad64 6.33%, #f7d18f 102.21%) !important
            }
            #toplevel_page_kcg a.toplevel_page_kcg img{width: 18px; height: 18px;}
        </style>
    <?php }
}