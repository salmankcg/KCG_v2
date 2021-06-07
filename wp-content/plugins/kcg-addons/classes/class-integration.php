<?php
namespace KC_GLOBAL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Integration{

    public function __construct(){
        add_action( 'elementor/init', [$this, 'kcg__register_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [$this, 'kcg__register'] );  
    }
    
    public function kcg__register_category() {
		$elements_manager = \Elementor\Plugin::instance()->elements_manager;
		$kcg_cat       = 'kcg_cat';

		$elements_manager->add_category(
			$kcg_cat,
			array(
				'title' => esc_html__( 'KCG Elements', 'kcg' ),
				'icon'  => 'font',
			),
			1
		);
	}
    public static function kcg__widgets_map() {
        return [
            'about-world' => [
                'title' => __( 'About World', 'kcg' ),
                'icon' => 'eicon-globe',
            ],
            'about-content' => [
                'title' => __( 'About Content', 'kcg' ),
                'icon' => 'eicon-text',
            ],
            'about-service' => [
                'title' => __( 'About Service', 'kcg' ),
                'icon' => 'eicon-image',
            ],
            'approach' => [
                'title' => __( 'Approach', 'kcg' ),
                'icon' => 'eicon-text',
            ],
            'blog' => [
                'title' => __( 'Blog', 'kcg' ),
                'icon' => 'eicon-post',
            ],
            'clients' => [
                'title' => __( 'Clients', 'kcg' ),
                'icon' => 'eicon-post-slider',
            ],
            'contact' => [
                'title' => __( 'Contact', 'kcg' ),
                'icon' => 'eicon-text',
            ],
            // 'footer' => [
            //     'title' => __( 'Footer', 'kcg' ),
            //     'icon' => 'eicon-footer',
            // ],
            'globe' => [
                'title' => __( 'Globe', 'kcg' ),
                'icon' => 'eicon-globe',
            ],
            'page-title' => [
                'title' => __( 'Page Title', 'kcg' ),
                'icon' => 'eicon-post-title',
            ],
            'page-text' => [
                'title' => __( 'Page Text', 'kcg' ),
                'icon' => 'eicon-post-title',
            ],
            'team' => [
                'title' => __( 'Team Member', 'kcg' ),
                'icon' => 'eicon-user-circle-o',
            ],
            'team-members' => [
                'title' => __( 'Team Members Grid', 'kcg' ),
                'icon' => 'eicon-user-circle-o',
            ],
            'services' => [
                'title' => __( 'Service', 'kcg' ),
                'icon' => 'eicon-post-content',
            ],
            'service-content' => [
                'title' => __( 'Service Content', 'kcg' ),
                'icon' => 'eicon-post-content',
            ],
            'strategy-menu' => [
                'title' => __( 'Strategy Menu', 'kcg' ),
                'icon' => 'eicon-menu-bar',
            ],
            'strategy' => [
                'title' => __( 'Strategy', 'kcg' ),
                'icon' => 'eicon-document-file',
            ],
            'strategy-content' => [
                'title' => __( 'Strategy Content', 'kcg' ),
                'icon' => 'eicon-post-content',
            ],
            'portfolio' => [
                'title' => __( 'Prtfolio', 'kcg' ),
                'icon' => 'eicon-document-file',
            ],
            'journal' => [
                'title' => __( 'Journal', 'kcg' ),
                'icon' => 'eicon-document-file',
            ],
            'testimonials' => [
                'title' => __( 'Testimonials', 'kcg' ),
                'icon' => 'eicon-post-slider',
            ],
        ];
    }
    public function kcg__register() {
        $_inactive       = _get_inactive();
        require CREST_PATH . 'classes/class-base.php';
        foreach ( self::kcg__widgets_map() as $widget_key => $data ) {
            $slug = CREST_PATH . 'widgets/' . $widget_key . '/widget.php';
            if ( !is_readable( $slug) ) { 
                continue;
            }
            include_once( $slug );
            $widget_class = '\KC_GLOBAL\Widget\\' . str_replace( '-', '_', $widget_key );
            if ( class_exists( $widget_class ) ) {
                if ( ! in_array( $widget_key, $_inactive ) ) {
                    kcg__elementor()->widgets_manager->register_widget_type( new $widget_class );
                }
            }
        }
    }
}