<?php 

namespace KC_GLOBAL;

use KC_GLOBAL\Locale as Language;
use KC_GLOBAL\Utils;
use KC_GLOBAL\Arise;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Dashboard{
	
	const __OPTION_KEY__ = '_kcg_settings_';
	const UPLOADS_DIR = '/kcg/';
	protected $plugin_name;
	public $arise;

	protected $version;

	public $dashboard_slug = 'kcg';

	public $utils;

	private $page = null;

    public function __construct(){
    	if ( defined( 'CREST_VERSION' ) ) {
			$this->version = CREST_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->utils = new Utils;
		$this->arise = new Arise;
		$this->plugin_name = CREST_PLUGIN_NAME;
        $this->set_locale();
        add_action( 'admin_menu', array( $this, 'kcg_register_page' ), -999 );
        add_action('wp_ajax_kcg__elements', [$this, 'kcg__elements_callback'] );
    }

    private function set_locale() {
		$plugin_i18n = Language::kcg_plugin_textdomain();
		add_action('plugins_loaded', [$this, $plugin_i18n]);
	}
	
	public function kcg__get_plugin_name() {
		return $this->plugin_name;
	}

	public function kcg__get_version() {
		return $this->version;
	}
	public function is_dashboard_page() {
		return ( ! empty( $_GET['page'] ) && false !== strpos( $_GET['page'], $this->dashboard_slug ) );
	}
	public function get_initial_page() {
		return 'welcome-page';
	}
	public function kcg_register_page() {

		add_menu_page(
			esc_html__( 'KCG EL Addons', 'kcg-lite' ),
			esc_html__( 'KCG EL Addons', 'kcg-lite' ),
			'manage_options',
			$this->dashboard_slug,
			function() {
				include $this->utils->get_view( 'dashboard' );
			},
			CREST_IMAGE . 'sidebar-logo.png',
			59
		);

		add_submenu_page(
			$this->dashboard_slug,
			esc_html__( 'Dashboard', 'kcg' ),
			esc_html__( 'Dashboard', 'kcg' ),
			'manage_options',
			$this->dashboard_slug
		);

		do_action( 'kcg/after-page-registration', $this );
	}

	public function kcg_get_page() {

		if ( null === $this->page ) {

			$page = isset( $_GET['page'] ) && $this->dashboard_slug !== $_GET['page'] ? esc_attr( $_GET['page'] ) : $this->dashboard_slug . '-' . $this->get_initial_page();

			$this->page = str_replace( $this->dashboard_slug . '-', '', $page );
		}

		return $this->page;
	}
	public function kcg__elements_callback(){
		if (!current_user_can('manage_options')) {
                return;
            }
            $widget_data = [];
            $nonce = sanitize_text_field($_POST['security']);
            if (!wp_verify_nonce($nonce, 'kcg_elements_nonce')) {
                die('-1');
            }
            wp_parse_str($_POST['data'], $widget_data);
            $widgets = ! empty( $widget_data['elements'] ) ? $widget_data['elements'] : [];
            $inactive_widgets = array_values( array_diff( array_keys( \KC_GLOBAL\Integration::kcg__widgets_map() ), $widgets ) );
            unset($widget_data['security']);
            update_option(self::__OPTION_KEY__, $inactive_widgets);
            $this->arise->remove_backend_dir_files();
            die('1');
            die();
	}
}