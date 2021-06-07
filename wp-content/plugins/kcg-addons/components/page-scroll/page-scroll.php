<?php
namespace KC_GLOBAL;

use \Elementor\Controls_Manager;
use \Elementor\Controls_Stack;
use \Elementor\Core\DynamicTags\Dynamic_CSS;
use \Elementor\Core\Files\CSS\Post;
use \Elementor\Element_Base;

defined('ABSPATH') || die();

if (!class_exists('KCG_Page_Scroll')) {
    class KCG_Page_Scroll
    {
        private static $instance = null;

        public static function url(){
            $path = trailingslashit(plugin_dir_url( CREST_FILE )). 'components/page-scroll/';
            return $path;
        }

        public function init()
        {
            add_action( 'wp_enqueue_scripts', function() {       
                wp_enqueue_style( "kcg-scrolling-css", self::url() . 'js/scrolling.css' , null, kcg__version() );       
                wp_enqueue_style( "kcg-fullpage", self::url() . 'fullpage/fullpage.css' , null, kcg__version() );       
                wp_enqueue_script("kcg-fullpage", self::url() . 'fullpage/fullpage.js', [], kcg__version(), true);
                wp_enqueue_script("kcg-scroll-overflow", self::url() . 'fullpage/scroll-overflow.js', ['jquery', 'kcg-fullpage'], kcg__version(), true);
                wp_enqueue_script("kcg-scrolling", self::url() . 'js/scrolling.js', ['jquery', 'kcg-fullpage'], kcg__version(), true);
             } 
            );

            add_action( 'elementor/documents/register_controls', [$this, '_settings'] );
            add_action('elementor/element/section/section_layout/after_section_end', [$this, '_settings_page'], 999, 1);
            add_action('elementor/frontend/section/before_render', [ $this, '__add_content_render'], 1 );

        }

        public function _settings_page($element) {
            $post_id = get_the_ID();
            $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
            $page_settings_model = $page_settings_manager->get_model( $post_id );
            $kcg_onepage_enable = $page_settings_model->get_settings( 'kcg_onepage_enable' );

            $id = $element->get_id();
            if ( 'section' === $element->get_name() && $kcg_onepage_enable == 'yes') {

                $element->start_controls_section(
                    'kcg_onepage_section',
                    [
                        'label' => __( 'Set FullPage ID', 'kcg' ) ,
                        'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                        
                    ]
                );
         
                $element->add_control(
                    'kcg_onepage_section_enable',
                    [
                        'label' => __( 'Enable Scroll', 'kcg' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Yes', 'kcg' ),
                        'label_off' => __( 'No', 'kcg' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                    ]
                );
                $element->add_control(
                    'kcg_onepage_anchor_id',
                    [
                        'label' => __( 'Anchor ID', 'kcg' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'placeholder' => 'section_one',
                        'condition' => ['kcg_onepage_section_enable' => 'yes']
                    ]
                );
         
                $element->end_controls_section();

            }

        }

        public function _settings( $page  ){
            $settings = $page->get_settings_for_display();
          
            $page->start_controls_section(
                'kcg_onepage_settings',
                [
                    'label' => __( 'Full Page Settings', 'kcg' ),
                    'tab' => Controls_Manager::TAB_SETTINGS,
                ]
            );
    
            $page->add_control(
                'kcg_onepage_enable',
                [
                    'label' => __( 'Enable FullPage', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $page->add_control(
                'kcg_onepage_navi_enable',
                [
                    'label' => __( 'Display Navigation', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $page->add_control(
                'kcg_onepage_navi_posi',
                [
                    'label' => __( 'Navigation Position', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'left' => __( 'Left', 'kcg' ),
                        'right' => __( 'Right', 'kcg' ),
                    ],
                    'condition' => [
                        'kcg_onepage_navi_enable' => 'yes',
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
    
            $page->add_control(
                'kcg_onepage_autoscroll',
                [
                    'label' => __( 'Auto Scroll', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_scrollbar',
                [
                    'label' => __( 'ScrollBar', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_overflow',
                [
                    'label' => __( 'Overflow Scroll', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_animation_anchor',
                [
                    'label' => __( 'Animate Anchor', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_animation_css3',
                [
                    'label' => __( 'Animate Css3', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_verticalcenter',
                [
                    'label' => __( 'Verticla Center', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_lazyLoading',
                [
                    'label' => __( 'LazyLoading', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $page->add_control(
                'kcg_onepage_menu_heading',
                [
                    'label' => __( 'Menu options', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $page->add_control(
                'kcg_onepage_menu_enable',
                [
                    'label' => __( 'Enable Menu', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'On', 'kcg' ),
                    'label_off' => __( 'Off', 'kcg' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'kcgmenu_title', [
                    'label' => __( 'Title', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Menu Title' , 'kcg' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'kcgmenu_id', [
                    'label' => __('Anchor ID', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                    'placeholder' => 'section1',
                    'show_label' => true,
                ]
            );

            $repeater->add_control(
                'kcgmenu_icon',
                [
                    'label' => __( 'Icon', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );

            $page->add_control(
                'kcg_onepage_menus',
                [
                    'label' => __( 'Menus', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'kcgmenu_title' => __( 'Section 1', 'kcg' ),
                            'kcgmenu_id' => 'section1',
                        ],
                       
                    ],
                    'title_field' => '{{{ kcgmenu_title }}}',
                    'condition' => [
                        'kcg_onepage_menu_enable' => 'yes',
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

    
            $page->add_control(
                'kcg_onepage_toggle_heading',
                [
                    'label' => __( 'Preview & Next Button', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $page->add_control(
                'kcg_onepage_toggle_preview', [
                    'label' => __( 'Preview Text', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Preview' , 'kcg' ),
                    'label_block' => true,
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );
            $page->add_control(
                'kcg_onepage_toggle_next', [
                    'label' => __( 'Next Text', 'kcg' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Next' , 'kcg' ),
                    'label_block' => true,
                    'condition' => [
                        'kcg_onepage_enable' => 'yes',
                    ]
                ]
            );

            $page->end_controls_section();

        }
        
        public function __add_content_render( Element_Base $el ){
            $post_id = get_the_ID();
            $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
            $page_settings_model = $page_settings_manager->get_model( $post_id );
            $kcg_onepage_enable = $page_settings_model->get_settings( 'kcg_onepage_enable' );

            $settings = $el->get_settings_for_display();
            $id = $el->get_id();
            $sctionEnable = isset($settings['kcg_onepage_section_enable']) ? $settings['kcg_onepage_section_enable'] : 'no';
            $idAnchor = isset($settings['kcg_onepage_anchor_id']) ? $settings['kcg_onepage_anchor_id'] : $id;
            $idAnchor = empty($idAnchor) ? $id : $idAnchor;

            if ( 'section' === $el->get_name() &&  $kcg_onepage_enable == 'yes' && $sctionEnable == 'yes') {

                $menuenable = $page_settings_model->get_settings( 'kcg_onepage_menu_enable' );
                $menu = $page_settings_model->get_settings( 'kcg_onepage_menus' );
                $navigation = $page_settings_model->get_settings( 'kcg_onepage_navi_enable' );
                $navigationPosition = $page_settings_model->get_settings( 'kcg_onepage_navi_posi' );
                $autoScrolling = $page_settings_model->get_settings( 'kcg_onepage_autoscroll' );
                $scrollBar = $page_settings_model->get_settings( 'kcg_onepage_scrollbar' );
                $scrollOverflow = $page_settings_model->get_settings( 'kcg_onepage_overflow' );
                $animateAnchor = $page_settings_model->get_settings( 'kcg_onepage_animation_anchor' );
                $css3 = $page_settings_model->get_settings( 'kcg_onepage_animation_css3' );
                $verticalCentered = $page_settings_model->get_settings( 'kcg_onepage_verticalcenter' );
                $lazyLoading = $page_settings_model->get_settings( 'kcg_onepage_lazyLoading' );
                
                
                $settingsScroll['navigation'] = ($navigation == 'yes') ? true : false;
                $settingsScroll['navigationPosition'] = $navigationPosition;
                $settingsScroll['autoScrolling'] = ($autoScrolling == 'yes') ? true : false;
                $settingsScroll['scrollBar'] = ($scrollBar == 'yes') ? true : false;
                $settingsScroll['scrollOverflow'] = ($scrollOverflow == 'yes') ? true : false;
                $settingsScroll['animateAnchor'] = ($animateAnchor == 'yes') ? true : false;
                $settingsScroll['css3'] = ($css3 == 'yes') ? true : false;
                $settingsScroll['verticalCentered'] = ($verticalCentered == 'yes') ? true : false;
                $settingsScroll['lazyLoading'] = ($lazyLoading == 'yes') ? true : false;
            
                $attr['class'] = 'kcg-section';
                if( $menuenable == 'yes'){
                    $attr['data-fp-styles'] = 'null';
                    $attr['data-anchor'] = $idAnchor;
                    $attr['data-kcgmenus'] = wp_json_encode($menu);

                    $settingsScroll['menu'] = '#kcgonpage-menu';
                }

                $settingsScroll['sectionSelector'] = '.kcg-section';
                $settingsScroll['slideSelector'] = '.kcg-slide';

                $attr['data-onpage-scroll'] = wp_json_encode($settingsScroll);

                $preview = $page_settings_model->get_settings( 'kcg_onepage_toggle_preview' );
                $next = $page_settings_model->get_settings( 'kcg_onepage_toggle_next' );
                $attr['data-onpage-preview'] = $preview;
                $attr['data-onpage-next'] = $next;
                
                $el->add_render_attribute(
                    '_wrapper',
                    $attr
                );
            }
        }

        public static function get_instance(){
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }
    }
}
