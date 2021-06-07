<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \KC_GLOBAL\Template as kcg_Template;
use \Elementor\CREST_BASE;
use \KC_GLOBAL\Utils as KcgUtils;

if (!defined('ABSPATH')) exit;


class Footer extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-footer';
    }

    public function get_title(){
        return esc_html__( 'Footer', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-footer';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'footer', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        get_template_part( 'template-parts/content', 'footer' );
        $this->__close_wrap();
    }
    
}
