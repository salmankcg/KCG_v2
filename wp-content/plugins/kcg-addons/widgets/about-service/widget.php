<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class About_Service extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-about-service';
    }

    public function get_title(){
        return esc_html__( 'About Service', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-image';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'about clients', 'clients', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_about_service_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_about_clients_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_about_services_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $repeater = new Repeater();
        
         $repeater->add_control(
            '_kcg_about_s_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'We provide a full <strong>range of services</strong> to help your reach your goals', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_about_s_subtitle',
            [
                'label' => 'Sub Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'What We Do', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter sub title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_about_s_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Get Started', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
            '_kcg_about_s_btn_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' =>[
                    '_kcg_about_s_btn!' => '',
                ]
            ]
        );
         $repeater->add_control(
            '_kcg_about_s_image', [
                'label' => __('Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'description' => __('Select image size (or) Leave it empty to apply theme default.', 'kcg'),
            ]
        );
         
         $this->add_control(
            '_kcg_about_services',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_about_s_title' => __( 'We provide a full <strong>range of services</strong> to help your reach your goals', 'kcg' ),
                        '_kcg_about_s_subtitle' => __( 'What We Do', 'kcg' ),
                        '_kcg_about_s_btn' => __( 'Our Services', 'kcg' ),
                        '_kcg_about_s_btn_link' => [
                            'url' => '#',
                        ],
                        '_kcg_about_s_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_s_title' => __( 'Our <strong>innovative approach</strong> is centered around your business’s lifecycle', 'kcg' ),
                        '_kcg_about_s_subtitle' => __( 'How we do it', 'kcg' ),
                        '_kcg_about_s_btn' => __( 'Our Approach', 'kcg' ),
                        '_kcg_about_s_btn_link' => [
                            'url' => '#',
                        ],
                        '_kcg_about_s_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_about_s_title' => __( 'A <strong>global team</strong> commited to help our clients build a better world.', 'kcg' ),
                        '_kcg_about_s_subtitle' => __( 'Who Make it', 'kcg' ),
                        '_kcg_about_s_btn' => __( 'Meet Our Team', 'kcg' ),
                        '_kcg_about_s_btn_link' => [
                            'url' => '#',
                        ],
                        '_kcg_about_s_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                
                'title_field' => '{{ _kcg_about_s_subtitle }}',
            ]
        );
        $this->add_control(
            '_kcg_about_s_class',
            [
                'label' => 'Section Class',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => 'about-content ac-black',
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->end_controls_section();
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $section_class = !empty($settings['_kcg_about_s_class']) ? $settings['_kcg_about_s_class'] : 'about-content ac-black';
        $this->__open_wrap();
        ?>
        <div class="<?php echo esc_attr($section_class); ?>">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-11">
                        <div class="highlights">
                            <?php 
                                if ( empty( $settings['_kcg_about_services'] ) ) {
                                        return;
                                    }
                                $i = 1;
                                foreach ( $settings['_kcg_about_services'] as $item ) : 
                            ?>
                                <div class="item">
                                    <div class="h-text">
                                        
                                        <?php if (isset($item['_kcg_about_s_subtitle']) && !empty($item['_kcg_about_s_subtitle'])): ?>
                                            <div class="caption c-white"><span><?php echo $this->parse_text_editor($item['_kcg_about_s_subtitle']); ?></span></div>
                                        <?php endif; ?>
                                        <?php if (isset($item['_kcg_about_s_title']) && !empty($item['_kcg_about_s_title'])): ?>
                                            <h2 class="title t-small t-white"><?php echo $this->parse_text_editor($item['_kcg_about_s_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (isset($item['_kcg_about_s_btn']) && !empty($item['_kcg_about_s_btn'])): ?>
                                            <a <?php echo kcg__link($item['_kcg_about_s_btn_link']); ?> class="button">
                                                <div class="wrapper">
                                                    <span class="text"><?php echo $this->parse_text_editor($item['_kcg_about_s_btn']); ?></span>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if(isset($item['_kcg_about_s_image']['url']) && !empty($item['_kcg_about_s_image']['url'])) : 
                                        $image = wp_get_attachment_image_url( $item['_kcg_about_s_image']['id'], $item['thumbnail_size'] );
                                        ?>
                                        <div class="image">
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta($item['_kcg_about_s_image']['id'], '_wp_attachment_image_alt', true); ?>"/>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
