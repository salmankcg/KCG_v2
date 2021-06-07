<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class About_News extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-about-news';
    }

    public function get_title(){
        return esc_html__( 'About News', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post';
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
            '_kcg_about_newss_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_about_news_section',
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
            '_kcg_about_news_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_about_news_heading',
            [
                'label' => 'Heading',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'What We Do', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter heading text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_news_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'See All', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_about_news_btn_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' =>[
                    '_kcg_about_news_btn!' => '',
                ]
            ]
        );
        $repeater = new Repeater();
         $repeater->add_control(
            '_kcg_about_news_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'We adopted some elephants in Thailand!', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         
         $repeater->add_control(
            '_kcg_about_news_image', [
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
        $repeater->add_control(
            '_kcg_about_news_bg',
            [
                'label' => __('Bottom Color Namme', 'kcg'),
                'type' => Controls_Manager::TEXT,
                'default' => 'orange',
                'placeholder' =>'orange',
                'description' => __('Please enter color name (or) Leave it empty to hide.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_about_news_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_newss',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_about_news_title' => __('We adopted some elephants in Thailand!', 'kcg'),
                        '_kcg_about_news_bg'    => 'orange',
                        '_kcg_about_news_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_about_news_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        '_kcg_about_news_title' => __('Collaboration is the key for a remote work.', 'kcg'),
                        '_kcg_about_news_bg'    => 'green',
                        '_kcg_about_news_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_about_news_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        '_kcg_about_news_title' => __('How to bring teams together and manage time zones.', 'kcg'),
                        '_kcg_about_news_bg'    => 'yellow',
                        '_kcg_about_news_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_about_news_link' => [
                            'url' => '#',
                        ],
                    ],
                ],
                'title_field' => '{{ _kcg_about_news_title }}',
            ]
        );
        $this->end_controls_section();
        
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="about-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-11">
                        <div class="caption">
                            <?php if (isset($settings['_kcg_about_news_heading']) && !empty($settings['_kcg_about_news_heading'])): ?>
                                <span><?php echo $this->parse_text_editor($settings['_kcg_about_news_heading']); ?></span>
                            <?php endif; ?>
                            <?php if (isset($settings['_kcg_about_news_btn']) && !empty($settings['_kcg_about_news_btn'])): ?>
                                <a <?php echo kcg__link($settings['_kcg_about_news_btn_link']); ?> class="button b-black b-icon">
                                    <div class="label"><?php echo $this->parse_text_editor($settings['_kcg_about_news_btn']); ?></div>
                                    <div class="wrapper">
                                        <div class="arrow svg a-right"></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="journal-list">
                            <?php
                             
                            if ( empty( $settings['_kcg_about_newss'] ) ) {
                                    return;
                                }
                            $i = 1;
                            foreach ( $settings['_kcg_about_newss'] as $item ) : 
                                $dataColor = isset($item['_kcg_about_news_bg']) && !empty($item['_kcg_about_news_bg']) ? $item['_kcg_about_news_bg'] : '';
                                ?>
                                <a <?php echo kcg__link($item['_kcg_about_news_link']); ?> class="item" data-color="orange">
                                    <?php if(isset($item['_kcg_about_news_image']['url']) && !empty($item['_kcg_about_news_image']['url'])) : 
                                        $image = wp_get_attachment_image_url( $item['_kcg_about_news_image']['id'], $item['thumbnail_size'] );
                                        ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta($item['_kcg_about_news_image']['id'], '_wp_attachment_image_alt', true); ?>" />
                                    <?php endif; ?>
                                    <?php if (isset($item['_kcg_about_news_title']) && !empty($item['_kcg_about_news_title'])): ?>
                                        <div class="j-title"><?php echo $this->parse_text_editor($item['_kcg_about_news_title']); ?></div>
                                    <?php endif; ?>
                                </a>
                            <?php $i++; endforeach; ?>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
