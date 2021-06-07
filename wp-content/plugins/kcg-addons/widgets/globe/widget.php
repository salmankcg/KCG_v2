<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Globe extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-globe';
    }

    public function get_title(){
        return esc_html__( 'Globe', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-globe';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'globe', 'kcg globe', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            '_kcg_globe_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        
        $repeater = new Repeater();
    
        $repeater->add_control(
            '_kcg_globe_layout',
            [
                'label' => esc_html__( 'Layout', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'globe' => 'Globe',
                ],
                'default' => 'default',
            ]
        );
        $repeater->add_control(
            '_kcg_globe_title',
            [
                'label' => 'Title & Description',
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('WE ARE AN INTERNATIONAL <strong>COLLABORATIVE <br> OF TALENT</strong>', 'kcg'),
                'placeholder' => __('Enter your title', 'kcg'),
                'description' => __('If the field is empty, title will not be shown.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_text',
            [
                'label' => __('Description', 'kcg'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 10,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('We transverse global boundaries to help our clients build a better world.', 'kcg'),
                'placeholder' => __('Enter your description', 'kcg'),
                'description' => __('If the field is empty, content will not be shown.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_image_bg',
            [
                'label' => esc_html__('Background Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_bg',
                'default' => 'large',
                'separator' => 'after',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_image',
            [
                'label' => esc_html__('Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_img',
                'default' => 'large',
                'separator' => 'after',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Read about us', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text', 'kcg' ),
                'description' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_link',
            [
                'label' => __('Link', 'kcg'),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#',
                ],
                'condition' =>[
                    '_kcg_globe_btn!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_globe_bgc',
            [
                'label' => __('Background Color', 'kcg'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );
        $this->add_control(
            '_kcg_globes',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_globe_title' => __( 'WE ARE AN INTERNATIONAL <strong>COLLABORATIVE <br> OF TALENT</strong>', 'kcg' ),
                        '_kcg_globe_text' => __( 'We transverse global boundaries to help our clients build a better world.', 'kcg' ),
                        '_kcg_globe_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_btn'    => 'READ ABOUT US',
                        '_kcg_globe_link' => [
                            'url' => '#',
                        ],
                        '_kcg_globe_bgc'    => '#141515'
                    ],
                    [
                        '_kcg_globe_title' => __( 'WE DELIVER <strong>SPECIALIZED STRATEGIES</strong> TO REACH YOUR GOALS', 'kcg' ),
                        '_kcg_globe_text' => __( 'Our global team helps you to launch into new areas with expert guidance.', 'kcg' ),
                        '_kcg_globe_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_btn'    => 'Our Solutions',
                        '_kcg_globe_link' => [
                            'url' => '#',
                        ],
                        '_kcg_globe_bgc'    => '#2D3294'
                    ],
                    [
                        '_kcg_globe_title' => __( 'WE CREATE <strong>INTELLIGENT CONTENT</strong> TO CAPTURE HEARTS', 'kcg' ),
                        '_kcg_globe_text' => __( 'We generate content that not only gets viewed but shared, time and time again.', 'kcg' ),
                        '_kcg_globe_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_btn'    => 'Our Solutions',
                        '_kcg_globe_link' => [
                            'url' => '#',
                        ],
                        '_kcg_globe_bgc'    => '#B27EE4'
                    ],
                    [
                        '_kcg_globe_title' => __( 'WE DEVELOP PRODUCTS TO HELP YOU <strong>CHANGE THE WORLD</strong>', 'kcg' ),
                        '_kcg_globe_text' => __( 'We work with you to design and create products that grow your business.', 'kcg' ),
                        '_kcg_globe_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_globe_btn'    => 'Our Solutions',
                        '_kcg_globe_link' => [
                            'url' => '#',
                        ],
                        '_kcg_globe_bgc'    => '#4C9F91'
                    ],
                ],
                
                //'title_field' => '{{ _kcg_globe_title }}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_globe_section',
            [
                'label' => __( 'Globe', 'kcg' ),
            ]
        );
        $repeater_globe = new Repeater();
        $repeater_globe->add_control(
            '_kcg_globe_name',
            [
                'label' => 'Name & Location',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Saul Tessler', 'kcg'),
                'placeholder' => __('Enter your name', 'kcg'),
                'description' => __('If the field is empty, name will not be shown.', 'kcg'),
            ]
        );
        $repeater_globe->add_control(
            '_kcg_globe_location',
            [
                'label' => __('Location', 'kcg'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Barcelona', 'kcg'),
                'placeholder' => __('Enter your location', 'kcg'),
                'description' => __('If the field is empty, location will not be shown.', 'kcg'),
            ]
        );
        $repeater_globe->add_control(
            '_kcg_globe_image_glb',
            [
                'label' => esc_html__('Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater_globe->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_glb',
                'default' => 'large',
                'separator' => 'after',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
        
        $this->add_control(
            '_kcg_globe_maps',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater_globe->get_controls(),
                'default' => [
                    [
                        '_kcg_globe_name' => __( 'Saul Tessler', 'kcg' ),
                        '_kcg_globe_location' => __( 'Barcelona', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Salman Ahmed', 'kcg' ),
                        '_kcg_globe_location' => __( 'Bangladesh', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Russell', 'kcg' ),
                        '_kcg_globe_location' => __( 'Bangladesh', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Cem Celik', 'kcg' ),
                        '_kcg_globe_location' => __( 'Spain', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Luiz Rodrigues', 'kcg' ),
                        '_kcg_globe_location' => __( 'Brazil', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Nicolai', 'kcg' ),
                        '_kcg_globe_location' => __( 'Moldova', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Rita Das', 'kcg' ),
                        '_kcg_globe_location' => __( 'Portugal', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_globe_name' => __( 'Ksenija', 'kcg' ),
                        '_kcg_globe_location' => __( 'Serbia', 'kcg' ),
                        '_kcg_globe_image_glb' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                
                'title_field' => '{{ _kcg_globe_name }}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 1 );
        
        $this->__open_wrap();
        ?>
        <div class="home-content hc-slides">
            <div class="home-bckg">
                <div class="shape">
                    <?php 
                    foreach ( $settings['_kcg_globes'] as $index => $item ) :
                        $globe_count = $index + 1;
                        $bg_image = wp_get_attachment_image_url( $item['_kcg_globe_image_bg']['id'], $item['thumbnail_bg_size'] );
                    ?>
                    <?php if (!empty($bg_image)): ?>
                        <div class="shape-image" style="background-image:url(<?php echo $bg_image; ?>);"></div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="images">
                    
                    <?php 
                    foreach ( $settings['_kcg_globes'] as $index => $item ) :
                        $globe_count = $index + 1;
                        $_image = wp_get_attachment_image_url( $item['_kcg_globe_image']['id'], $item['thumbnail_img_size'] );

                    ?>
                    <?php if (!empty($item['_kcg_globe_image']['url'])): ?>
                        <?php if( $globe_count == 1 ) : ?>
                            <div class="img"></div>
                        <?php else: ?>
                        <div class="img"><img src="<?php echo esc_url($_image); ?>" alt="<?php echo get_post_meta($item['_kcg_globe_image']['id'], '_wp_attachment_image_alt', true); ?>"/></div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php 
                    foreach ( $settings['_kcg_globes'] as $index => $item ) :
                        
                    ?>
            <?php if( $item['_kcg_globe_layout'] === 'globe') : ?>
                <div class="globe">
                    <div class="g-wrapper">
                        <div class="circle"></div>
                        <div id="canvas" class="canvas" data-people='[
                            <?php 
                            $i = 0;
                            $ilen = count( $settings['_kcg_globe_maps'] );
                                foreach ( $settings['_kcg_globe_maps'] as $index => $item_map ) :
                                    $globe_count = $index + 1;
                                    $glb_image = wp_get_attachment_image_url( $item_map['_kcg_globe_image_glb']['id'], $item_map['thumbnail_glb_size'] );
                            ?>
                                {"person":"<?php echo $this->parse_text_editor($item_map['_kcg_globe_name']); ?>", "thumb":"<?php echo $glb_image; ?>", "place":"<?php echo $this->parse_text_editor($item_map['_kcg_globe_location']); ?>"}<?php if( ++$i == $ilen ){ echo " ";}else{echo ',';} ?>
                            <?php endforeach; ?>
                        ]'>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php 
                foreach ( $settings['_kcg_globes'] as $index => $item ) :
                    $globe_count = $index + 1;
                    $bg_image = wp_get_attachment_image_url( $item['_kcg_globe_image_bg']['id'], $item['thumbnail_bg_size'] );
                    $section_color = !empty($item['_kcg_globe_bgc']) ? $item['_kcg_globe_bgc'] : '#141515';
            ?>
            <div class="infos" data-color="<?php echo esc_attr($section_color); ?>" id="slide-<?php echo esc_attr($globe_count); ?>">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                    <?php if (!empty($item['_kcg_globe_title'])): ?>
                    <div class="col col-5">
                        <h2 class="title t-white"><?php echo $this->parse_text_editor($item['_kcg_globe_title']); ?></h2>
                    </div>
                    <?php endif; ?>
                    <div class="col col-3 align-self-center">
                        <div class="i-wrapper">
                        <?php if (!empty($item['_kcg_globe_text'])): ?>
                        <div class="paragraph p-rigth p-white"><?php echo $this->parse_text_editor($item['_kcg_globe_text']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($item['_kcg_globe_btn'])): ?>
                        <a <?php echo kcg__link($item['_kcg_globe_link']); ?> class="button b-white">
                            <div class="wrapper">
                            <span class="text"><?php echo $this->parse_text_editor($item['_kcg_globe_btn']); ?></span>
                            </div>
                        </a>
                        <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php $this->__close_wrap();?>
    <?php }
    
}
