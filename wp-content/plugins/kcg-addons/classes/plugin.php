<?php
namespace KC_GLOBAL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

Final class Plugin {

    const __CREST_PHP__ = '5.6';
    const __CREST_EL_VERSION__ = '2.0.0';
    const __CREST_RECOMMENDATION_EL_VERSION__ = '2.0.0';
    
    public static $instance = null;
    private static $classes_map;
    
    public static function instance(){
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            do_action( 'kcg_lite/loaded' );
        }
        return self::$instance;
    }
    
    private function kcg__notice() {
        require_once CREST_PATH . 'classes/class-notice.php';
        return new Notice();
    }
    public function kcg__notice_missing_free_plugin(){
         return $this->kcg__notice()->kcg__missing_php(); 
    }
    public function kcg__missing_el_plugin(){
         return $this->kcg__notice()->is_missing_elementor_plugin(); 
    }
    public function kcg__minimum_version(){
         return $this->kcg__notice()->is_minimum_el_version(); 
    }
    public function kcg__re_version(){
         return $this->kcg__notice()->is_recommendation_el_version(); 
    }
    public function kcg__thanks_message(){
         return $this->kcg__notice()->thanks_message_notice(); 
    }
    public function ajax_kcg__set_thanks_message(){
         return $this->kcg__notice()->ajax_kcg__set_thanks_message(); 
    }

    public function kcg__load_check(){
        if (version_compare(PHP_VERSION, self::__CREST_PHP__, '<')) {
            add_action('admin_notices', [$this, 'kcg__notice_missing_free_plugin']);
            return;
        }
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'kcg__missing_el_plugin']);
            return;
        }
        if (!version_compare(ELEMENTOR_VERSION, self::__CREST_EL_VERSION__, '>=')) {
            add_action('admin_notices', [$this, 'kcg__minimum_version']);
            return;
        }
        if (!version_compare(ELEMENTOR_VERSION, self::__CREST_RECOMMENDATION_EL_VERSION__, '>=')) {
            add_action('admin_notices', [$this, 'kcg__re_version']);
            return;
        }
        require_once CREST_PATH . 'classes/class-helper.php';
       $this->register_autoloader();
    }
    
    public function kcg__activation(){
        require_once CREST_PATH . 'classes/class-activator.php';
        kcg__Activator::kcg__activate();
    }
    
    public function kcg__deactivation(){
        require_once CREST_PATH . 'classes/class-deactivator.php';
        kcg__Deactivator::kcg__deactivate();
        kcg__Deactivator::kcg__user_meta_delete();     
    }

    public function kcg__installed_time() {
        $installed_time = get_option( '_kcg__installed_time' );

        if ( ! $installed_time ) {
            $installed_time = time();

            update_option( '_kcg__installed_time', $installed_time );
        }

        return $installed_time;
    }
    
    private function kcg__loaded(){
        add_action('plugins_loaded', [$this, 'kcg__load_check']);
    }

    private function kcg__hooks(){
        add_action( 'admin_notices', [$this, 'kcg__thanks_message'] );
        add_action( 'wp_ajax_kcg__set_thanks_message', [$this, 'ajax_kcg__set_thanks_message'] );
        register_activation_hook(CREST_FILE, [$this, 'kcg__activation']);
        register_activation_hook(CREST_FILE, [$this, 'kcg__installed_time']);
        register_deactivation_hook(CREST_FILE, [$this, 'kcg__deactivation']);
        $this->kcg__loaded();
    }
    private function __construct(){
       $this->kcg__hooks();
    }
    private function register_autoloader() {
        require CREST_PATH . '/classes/autoloader.php';
        \KC_GLOBAL\Autoloader::run();
        \KC_GLOBAL\Autoloader::kcg__components();
    }
}

if (defined("CREST_PLUGIN_NAME")) {
    Plugin::instance();
}