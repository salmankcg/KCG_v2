<?php
namespace KC_GLOBAL;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Control_Media;
use \Elementor\Controls_Stack;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Parallax{

	private static $instance;

	public static function dir_url(){
        $path = trailingslashit(plugin_dir_url( CREST_FILE )). 'components/control/parallax/';
		return $path;
	}

	public function init() {
		add_action( 'wp_enqueue_scripts', [$this, 'register_frontend_scripts'] );
		add_action( 'elementor/frontend/before_enqueue_scripts', [$this, 'kcg_editor_scripts'], 99 );
		add_action( 'elementor/element/section/section_layout/after_section_end', [$this, 'register_controls' ], 10 );
	}
	public function register_frontend_scripts() {
		wp_enqueue_style( 'kcg-parallax-aos', self::dir_url() . 'assets/css/aos.css' , null, kcg__version() );
		wp_enqueue_style( 'kcg-parallax-style', self::dir_url() . 'assets/css/style.css' , null, kcg__version() );
		wp_enqueue_script( 'kcg-parallax-jarallax', self::dir_url() . 'assets/js/jarallax.js', array('jquery'), kcg__version(), false );
        wp_enqueue_script( 'kcg-parallax-wow', self::dir_url() . 'assets/js/wow.min.js', array('jquery'), kcg__version(), false );
		wp_enqueue_script( 'kcg-parallax-tweenmax', self::dir_url() . 'assets/js/TweenMax.min.js', array('jquery'), kcg__version(), true );
        wp_enqueue_script( 'kcg-parallax-jquery-easing', self::dir_url() . 'assets/js/jquery.easing.1.3.js', array('jquery'), kcg__version(), true );
		wp_enqueue_script( 'kcg-parallax-tilt', self::dir_url() . 'assets/js/tilt.jquery.min.js', array('jquery'), kcg__version(), true );
        wp_enqueue_script( 'anime-js', self::dir_url() . 'assets/js/anime.js', array('jquery'), kcg__version(), true );
		wp_enqueue_script( 'kcg-parallax-magician', self::dir_url() . 'assets/js/magician.js', array('jquery'), kcg__version(), true );
		//wp_enqueue_script( 'kcg-parallax-aos', self::dir_url() . 'assets/js/aos.js', array('jquery'), kcg__version(), true );
	}

	public function kcg_editor_scripts(){
		wp_enqueue_script( 'kcg-parallax-script', self::dir_url() . 'assets/js/scripts.js', array( 'jquery', 'elementor-frontend' ), kcg__version(), true );
	}

	public function register_controls($el)
    {
        $el->start_controls_section(
            'kcg_section_parallax',
            [
                'label' => __( 'Parallax', 'kcg' ),
                'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
        $el->add_control(
            'kcg_background_parallax',
            [
                'label' => esc_html__('Background Parallax', 'kcg' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'kcg' ),
                'label_off' => esc_html__('Hide', 'kcg' ),
                'render_type' => 'none',
                'frontend_available' => true,
            ]
        );
        $el->add_control(
            'kcg_background_parallax_speed', [
                'label' => esc_html__('Speed', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'max' => .9,
                'frontend_available' => true,
                'min' => .1,
                'step' => .1,
                'default' => 0.5,
                'condition' => [
                    'kcg_background_parallax' => 'yes',
                ]
            ]
        );
        $el->add_control(
			'kcg_section_parallax_multi',
			[
				'label'       => __( 'Type', 'kcg' ),
				'type'        => Controls_Manager::SELECT,
                'frontend_available' => true,
				'options'     => [
					''          => __( 'Select', 'kcg' ),
                    'multi'          => __( 'Multi Layer', 'kcg' ),
                ],
				'label_block' => 'true',
				
			]
		);
       
        $repeater = new Repeater();
        $repeater->add_control(
	        'parallax_style',
	        [   
	            'label' => esc_html__('Type', 'kcg' ),
	            'type' => Controls_Manager::CHOOSE,
	            'label_block' => false,
	            'options' => [
	                'mousemove' => [
	                    'title' => esc_html__('Mouse Track', 'kcg' ),
	                    'icon' => 'eicon-cursor-move',
	                ],
	                'onscroll' => [
	                    'title' => esc_html__('On Scroll', 'kcg' ),
	                    'icon' => 'eicon-scroll',
	                ],
	                'tilt' => [
	                    'title' => esc_html__('Tilt Effect', 'kcg' ),
	                    'icon' => 'eicon-parallax',
	                ],
	                'none' => [
	                    'title' => esc_html__('None Effect', 'kcg' ),
	                    'icon' => 'eicon-parallax',
	                ],
	            ],
	            'default' => 'mousemove',
	        ]
	    );
        $repeater->add_control(
            'item_source',
            [
                'label' => esc_html__( 'Item source', 'kcg'  ),
                'type' => Controls_Manager::HIDDEN,
                'label_block' => false,
                'toggle' => false,
                'default' => 'image',
                'classes' => 'elementor-control-start-end',
                'render_type' => 'ui',

            ]
        );
        $repeater->add_control(
            'image',[
                'label' => esc_html__('Choose Image', 'kcg' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'item_source' => 'image',
                ],
            ]
        );

        $repeater->add_control(
			'width_type',
			[
				'label'       => __( 'Image Width', 'kcg' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on' => __( 'Custom', 'kcg' ),
				'label_off' => __( 'Auto', 'kcg' ),
				'return_value' => 'custom',
				'default' => '',
			]
		);
        $repeater->add_responsive_control(
            'custom_width',
            [
                'label' => esc_html__( 'Custom Width', 'kcg'  ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'condition' => [
                    'width_type' => 'custom',
                ],
                'size_units' => [ 'px', '%', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $repeater->add_responsive_control(
            'custom_height',
            [
                'label' => esc_html__( 'Custom Height', 'kcg'  ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'condition' => [
                    'width_type' => 'custom',
                ],
                'size_units' => [ 'px', '%', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'source_rotate', [
                'label' => esc_html__('Rotate', 'kcg' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => 'transform: rotate({{SIZE}}{{UNIT}})',
                ],

            ]
        );

        $repeater->add_responsive_control(
			'parallax_blur_effect',
			[
				'label' => esc_html__( 'Blur', 'kcg' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => .5,
					],
					'rem' => [
						'min' => 0,
                        'max' => 2,
                        'step' => .1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic' => 'filter: blur({{SIZE}}{{UNIT}});',
                ],
			]
        );
        $repeater->add_control(
            'pos_x_y',
            [
                'label'       => __( 'Position', 'kcg' ),
                'type'        => Controls_Manager::SWITCHER,
                'label_on' => __( 'Left', 'kcg' ),
                'label_off' => __( 'Right', 'kcg' ),
                'return_value' => 'left',
                'default' => 'left',
            ]
        );
        $repeater->add_responsive_control(
            'pos_x', [
                'label' => esc_html__('Horizontal', 'kcg' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%','px'],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -10000,
                        'max' => 10000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
                'condition' => [
                    'pos_x_y' => 'left',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}.kcg-section-parallax-layer" => 'left: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $repeater->add_responsive_control(
            'pos_r', [
                'label' => esc_html__('Horizontal Position Right', 'kcg' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%','px'],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -10000,
                        'max' => 10000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
                'condition' => [
                    'pos_x_y' => '',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}.kcg-section-parallax-layer" => 'right: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'pos_y',[
                'label' => esc_html__('Vertical Position', 'kcg' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%','px'],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 300,
                    ],
                    'px' => [
                        'min' => -10000,
                        'max' => 10000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}.kcg-section-parallax-layer" => 'top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $repeater->add_control(
            'item_opacity',
            [
                'label' => esc_html__( 'Opacity', 'kcg'  ),
                'type' => Controls_Manager::NUMBER,
                'default' => '1',
                'min' => 0,
                'step' => 1,
                'render_type' => 'none',
                'frontend_available' => true,
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'opacity:{{UNIT}}'
                ],
            ]
        );
        $repeater->add_control(
            '_mousemove_scroll_enable',
            [
                'label'       => __( 'Parallax Scroll', 'kcg' ),
                'type'        => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'kcg' ),
                'label_off' => __( 'No', 'kcg' ),
                'return_value' => 'yes',
                'default' => '',
                'frontend_available' => true,
                'render_type' => 'ui',
                'separator' => 'before',
                'condition' => [
                    'parallax_style' => 'mousemove'
                ],
            ]
        );
        $repeater->add_control(
            '_mousemove_parallax_transform', [
                'label' => esc_html__( 'Parallax Style', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'translateX' => esc_html__( 'X axis', 'kcg' ),
                    'translateY' => esc_html__( 'Y axis', 'kcg' ),
                    'rotate' => esc_html__( 'rotate', 'kcg' ),
                    'rotateX' => esc_html__( 'rotateX', 'kcg' ),
                    'rotateY' => esc_html__( 'rotateY', 'kcg' ),
                    'scale' => esc_html__( 'scale', 'kcg' ),
                    'scaleX' => esc_html__( 'scaleX', 'kcg' ),
                    'scaleY' => esc_html__( 'scaleY', 'kcg' ),
                ],
                'condition' => [
                    '_mousemove_scroll_enable' => 'yes',
                    'parallax_style' => 'mousemove'
                ],
            ]
        );
        $repeater->add_control(
            '_mousemove_parallax_transform_value', [
                'label' => esc_html__( 'Parallax Transition ', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '300',
                'condition' => [
                '_mousemove_scroll_enable' => 'yes',
                    'parallax_style' => 'mousemove'
                ]
            ]
        );
        $repeater->add_control(
            '_mousemove_smoothness', [
                'label' => esc_html__( 'Speed', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '500',
                'min' => 0,
                'max' => 1000,
                'step' => 100,
                'condition' => [
                    '_mousemove_scroll_enable' => 'yes',
                    'parallax_style' => 'mousemove'
                ]
            ]
        );
        $repeater->add_control(
            '_mousemove_offsettop',[
                'label' => esc_html__( 'Offset Top', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'condition' => [
                '_mousemove_scroll_enable' => 'yes',
                    'parallax_style' => 'mousemove'
                ]
            ]
        );
        $repeater->add_control(
            '_mousemove_offsetbottom', [
                'label' => esc_html__( 'Offset Bottom', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'separator' => 'after',
                'condition' => [
                '_mousemove_scroll_enable' => 'yes',
                    'parallax_style' => 'mousemove'
                ]
            ]
        );
        $repeater->add_control(
            'parallax_speed', [
                'label' => esc_html__('Speed', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 50,
                'min' => 10,
                'max' => 150,
                'condition' => [
                    'parallax_style' => 'mousemove',
                ]
            ]
        );

        $repeater->add_control(
            'parallax_transform', [
                'label' => esc_html__( 'Parallax Style', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'translateY',
                'options' => [
                    'translateX' => esc_html__( 'X axis', 'kcg' ),
                    'translateY' => esc_html__( 'Y axis', 'kcg' ),
                    'rotate' => esc_html__( 'rotate', 'kcg' ),
                    'rotateX' => esc_html__( 'rotateX', 'kcg' ),
                    'rotateY' => esc_html__( 'rotateY', 'kcg' ),
                    'scale' => esc_html__( 'scale', 'kcg' ),
                    'scaleX' => esc_html__( 'scaleX', 'kcg' ),
                    'scaleY' => esc_html__( 'scaleY', 'kcg' ),
                ],
                'condition' => [
                    'parallax_style' => 'onscroll'
                ],
            ]
        );
        $repeater->add_control(
            'parallax_transform_value', [
                'label' => esc_html__( 'Parallax Transition ', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '300',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'smoothness', [
                'label' => esc_html__( 'Speed', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '500',
                'min' => 0,
                'max' => 1000,
                'step' => 100,
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'offsettop',[
                'label' => esc_html__( 'Offset Top', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'offsetbottom', [
                'label' => esc_html__( 'Offset Bottom', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'maxtilt',[
                'label' => esc_html__( 'MaxTilt', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '20',
                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'scale',[
                'label' => esc_html__( 'Image Scale', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '1',
                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'disableaxis', [
                'label' => esc_html__( 'Disable Axis', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'None', 'kcg' ),
                    'x' => esc_html__( 'X axis', 'kcg' ),
                    'y' => esc_html__( 'Y axis', 'kcg' ),
                ],

                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'wow_enable',
            [
                'label'       => __( 'Enable Wow', 'kcg' ),
                'type'        => Controls_Manager::SWITCHER,
                // 'frontend_available' => true,
                // 'render_type' => 'ui',
                'label_on' => __( 'Yes', 'kcg' ),
                'label_off' => __( 'No', 'kcg' ),
                'return_value' => 'enable',
                'default' => '',
            ]
        );
        $repeater->add_control(
            'wow_animation',
            [
                'label' => esc_html__( 'Wow Animation', 'kcg' ),
                'type' => Controls_Manager::ANIMATION,
                'frontend_available' => true,
                'render_type' => 'ui',
                'default' => 'fadeIn',
                'condition' => [
                    'wow_enable' => 'enable',
                ]  
            ]
         );
   
        $repeater->add_control(
            'wow_delay',
            [
                'label' => esc_html__( 'Wow Delay', 'kcg' ) . ' (ms)',
                'type' => Controls_Manager::NUMBER,
                // 'frontend_available' => true,
                // 'render_type' => 'ui',
                'default' => '',
                'min' => 1,
                'step' => 100,
                'condition' => [
                    'wow_enable' => 'enable',
                    'wow_animation!' => '',
                ],
            ]
        );
        $repeater->add_control(
            'wow_mobile',
            [
                'label'       => __( 'Wow Mobile', 'kcg' ),
                'type'        => Controls_Manager::SWITCHER,
                // 'frontend_available' => true,
                // 'render_type' => 'ui',
                'label_on' => __( 'Yes', 'kcg' ),
                'label_off' => __( 'No', 'kcg' ),
                'return_value' => 'yes',
                'default' => 'yes',
                 'condition' => [
                    'wow_enable' => 'enable',
                ],
            ]
        );
        $repeater->add_control(
            '_anim_enable',
            [
                'label'       => __( 'Enable Animation', 'kcg' ),
                'type'        => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'kcg' ),
                'label_off' => __( 'No', 'kcg' ),
                'return_value' => 'yes',
                'default' => '',
                'frontend_available' => true,
                'render_type' => 'ui',
            ]
        );
         $repeater->add_control(
            '_parallax_animation',
            [
                'label' => esc_html__( 'Animation', 'kcg' ),
                'type' => Controls_Manager::ANIMATION,
                'frontend_available' => true,
                'render_type' => 'ui',
                'default' => '',
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => '-webkit-animation-name:{{UNIT}}',
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => 'animation-name:{{UNIT}}',
                ],
                'condition' => [
                    '_anim_enable' => 'yes'
                ],
            ]
         );
         $repeater->add_control(
            'animation_speed',
            [
                'label' => esc_html__( 'Animation speed', 'kcg' ) . ' (s)',
                'type' => Controls_Manager::NUMBER,
                'frontend_available' => true,
                'default' => '0.3',
                'min' => 0.1,
                'step' => 100,
                'render_type' => 'ui',
                'frontend_available' => true,
                'condition' => [
                    '_anim_enable' => 'yes',
                    '_parallax_animation!' => '',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => '-webkit-animation-duration:{{UNIT}}s',
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => 'animation-duration:{{UNIT}}s'
                ],
            ]
        );
        $repeater->add_control(
            'animation_iteration_count',
            [
                'label' => esc_html__( 'Animation Iteration Count', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'frontend_available' => true,
                'default' => 'infinite',
                'options' => [
                    'infinite' => esc_html__( 'Infinite', 'kcg' ),
                    'unset' => esc_html__( 'Unset', 'kcg' ),
                ],
                'condition' => [
                    '_anim_enable' => 'yes',
                    '_parallax_animation!' => '',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .kcg-parallax-graphic" => 'animation-iteration-count:{{UNIT}}'
                ],
            ]
        );
        $repeater->add_control(
            'zindex',   [
                'label' => esc_html__('z-index', 'kcg' ),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'kcg' ),
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'z-index: {{UNIT}}',
                ],
            ]
        );
        $el->add_control(
            'kcg_parallax_multi_items',
            [
                'label' => esc_html__( 'Parallax', 'kcg' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'frontend_available' => true,
                'title_field' => '{{{ parallax_style }}}',
                'condition' => [
                    'kcg_section_parallax_multi' => 'multi',
                ],

            ]
        );
        
        $el->add_control(
            'kcg_section_parallax_overflow',
            [
                'label' => esc_html__('Section Overflow', 'kcg' ),
                'type' => Controls_Manager::CHOOSE,
				'default' => 'visible',
                'options' => [
                    'visible' => [
                        'title' => esc_html__('Visible', 'kcg' ),
                        'icon' => 'eicon-preview-medium',
                    ],
                    'hidden' => [
                        'title' => esc_html__('Hidden', 'kcg' ),
                        'icon' => 'eicon-help-o',
                    ],
                ], 
                'selectors' => [
                    "{{WRAPPER}}" => 'overflow: {{VALUE}} !important'
                ]
            ]
        );

        $el->end_controls_section();
    }

	public static function get_instance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
