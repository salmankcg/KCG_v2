<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Strategy extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-strategy';
    }

    public function get_title(){
        return esc_html__( 'Strategy ', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-menu-bar';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'strategy', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_strategy_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_strategy_section',
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
            '_kcg_strategy_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $repeater = new Repeater();
    
        $repeater->add_control(
            '_kcg_strategy_layout',
            [
                'label' => esc_html__( 'Layout', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_one' => 'Style One',
                    'style_two' => 'Style Two',
                ],
                'default' => 'default',
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('STRATEGY', 'kcg'),
                'placeholder' => __('Enter your title', 'kcg'),
                'description' => __('If the field is empty, title will not be shown.', 'kcg'),
                'condition' => [
                    '_kcg_strategy_layout' => ['default', 'style_one']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_subtitle',
            [
                'label' => __('Sub Title', 'kcg'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 5,
                'show_label' => True,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Bring your next product or service to market.', 'kcg'),
                'placeholder' => __('Enter your description', 'kcg'),
                'description' => __('If the field is empty, sub title will not be shown.', 'kcg'),
                'condition' => [
                    '_kcg_strategy_layout' => ['default', 'style_one']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_text',
            [
                'label' => __('Description', 'kcg'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 10,
                'show_label' => True,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Launch into new areas with expert guidance and bespoke, visionary business strategies.', 'kcg'),
                'placeholder' => __('Enter your description', 'kcg'),
                'description' => __('If the field is empty, content will not be shown.', 'kcg'),
                'condition' => [
                    '_kcg_strategy_layout' => ['default', 'style_one']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_image_bg',
            [
                'label' => esc_html__('Background Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
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
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_image',
            [
                'label' => esc_html__('Image', 'kcg'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
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
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_btn',
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
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_link',
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
                    '_kcg_strategy_btn!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
                'condition' => [
                    '_kcg_strategy_layout' => ['default']
                ]
            ]
        );
        $repeater->add_control(
            '_kcg_strategy_bgc',
            [
                'label' => __('Background Color', 'kcg'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );
        $this->add_control(
            '_kcg_strategys',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_strategy_layout' => 'default',
                        '_kcg_strategy_title' => __( 'STRATEGY', 'kcg' ),
                        '_kcg_strategy_subtitle' => __( 'Bring your next product or service to market.', 'kcg' ),
                        '_kcg_strategy_text' => __( 'Launch into new areas with expert guidance and bespoke, visionary business strategies.', 'kcg' ),
                        '_kcg_strategy_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_strategy_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                       
                        '_kcg_strategy_btn'    => 'LEARN MORE',
                        '_kcg_strategy_link' => [
                            'url' => '#',
                        ],
                        '_kcg_strategy_bgc'    => '#2D3294'
                    ],
                    [
                        '_kcg_strategy_layout' => 'style_one',
                        '_kcg_strategy_title' => __( 'Solutions', 'kcg' ),
                        '_kcg_strategy_subtitle' => __( 'We will help you evolve what you have into a fully operational business, with a clear structure and a path to growth.', 'kcg' ),
                        '_kcg_strategy_text' => __( 'Our expert consultants will deliver tailored strategic advice developed over years of building and growing businesses from Silicon Valley to Wall Street.<br><br>Take your pick from our four key service areas, which are all designed to get you started with your next strategic win.', 'kcg' ),
                        '_kcg_strategy_image_bg' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        '_kcg_strategy_bgc'    => '#2D3294'
                    ],
                    [
                        '_kcg_strategy_layout' => 'style_two',
                        '_kcg_strategy_title' => __( 'Heading', 'kcg' ),
                        '_kcg_strategy_bgc'    => '#2D3294'
                    ],
                ],
                
                'title_field' => '{{ _kcg_strategy_title }}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_strategy_bx_content',
            [
                'label' => __( 'Box Content', 'kcg' ),
            ]
        );
        $repeater_bx = new Repeater();
        $repeater_bx->add_control(
            '_kcg_strategy_bx_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Research & Discovery', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        
        $repeater_bx->add_control(
            '_kcg_strategy_bx_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '<ul> <li>• Expert Research</li> <li>• Competitive benchmarking</li> <li>• Costumer Journey</li> <li>• Costumer Behavior & Insights</li> <li>• Analytical data review</li> </ul>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        
        $this->add_control(
            '_kcg_strategy_lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater_bx->get_controls(),
                'default' => [
                    [
                        '_kcg_strategy_bx_title' => __('Research & Discovery', 'kcg'),
                        '_kcg_strategy_bx_text' => '<ul> <li>• Expert Research</li> <li>• Competitive benchmarking</li> <li>• Costumer Journey</li> <li>• Costumer Behavior & Insights</li> <li>• Analytical data review</li> </ul>',
                    ],
                    [
                        '_kcg_strategy_bx_title' => __('Business Consultancy', 'kcg'),
                        '_kcg_strategy_bx_text' => '<ul> <li>• Startup Consultancy</li> <li>• Coaching & interin Services</li> <li>• Finance Management</li> <li>• Operational Management</li> <li>• Sales Strategy</li> <li>• Roadmapping</li> <li>• Strategic Consultancy</li> <li>• Digital Transformation</li> </ul>',
                    ],
                    [
                        '_kcg_strategy_bx_title' => __('Digital Go to Market', 'kcg'),
                        '_kcg_strategy_bx_text' => '<ul> <li>• Marketing Strategy</li> <li>• Sales Strategy</li> <li>• Content Strategy</li> <li>• Digital Go to Market</li> </ul>',
                    ],
                    [
                        '_kcg_strategy_bx_title' => __('Branding', 'kcg'),
                        '_kcg_strategy_bx_text' => '<ul> <li>• Brand Strategy</li> <li>• Tone of Voice</li> <li>• Visual Identity</li> <li>• Brand Guideline</li> </ul>',
                    ],
                ],
                'title_field' => '{{ _kcg_strategy_bx_title }}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_strategy_style_section',
            [
                'label' => __( 'General', 'kcg' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_kcg_strategy_section_bg',
            [
                'label' => __('Background Color', 'kcg'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $this->__open_wrap();
        ?>
        <div class="services-content sc-slides">
            <div class="services-bckg"></div>
            <?php 
                if ( empty( $settings['_kcg_strategys'] ) ) {
                    return;
                }
                foreach ( $settings['_kcg_strategys'] as $index => $item ) :
                    $strategy_count = $index + 1;
                    $_image = !empty($item['_kcg_strategy_image']) && isset($item['_kcg_strategy_image']) ? wp_get_attachment_image_url( $item['_kcg_strategy_image']['id'], $item['thumbnail_img_size'] ) : '';
                    $_image_bg = !empty($item['_kcg_strategy_image_bg']) && isset($item['_kcg_strategy_image_bg']) ? wp_get_attachment_image_url( $item['_kcg_strategy_image_bg']['id'], $item['thumbnail_bg_size'] ) : '';
                    $sec_bg = isset($item['_kcg_strategy_bgc']) && !empty($item['_kcg_strategy_bgc']) ? $item['_kcg_strategy_bgc'] : '#2D3294';
                    if($item['_kcg_strategy_layout'] == 'default'):
            ?>
                <div class="infos i-service" data-color="<?php echo esc_attr($sec_bg); ?>" id="slide-1" style="background-image:url(<?php echo esc_url($_image_bg); ?>)">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col col-1">
                                <a href="services.html" class="button b-icon b-white">
                                <div class="wrapper">
                                    <div class="arrow svg a-left"></div>
                                </div>
                                </a>
                            </div>
                            <div class="col col-4">
                                <?php if( !empty($item['_kcg_strategy_title']) ) : ?>
                                    <div class="caption c-white"><span><?php echo $this->parse_text_editor($item['_kcg_strategy_title']); ?></span></div>
                                <?php endif; ?>
                                <?php if( !empty($item['_kcg_strategy_subtitle']) ) : ?>
                                    <h1 class="title t-medium t-white" ><strong><?php echo $this->parse_text_editor($item['_kcg_strategy_subtitle']); ?></strong></h1>
                                <?php endif; ?>
                                <?php if( !empty($item['_kcg_strategy_text']) ) : ?>
                                    <div class="paragraph p-white"><?php echo $this->parse_text_editor($item['_kcg_strategy_text']); ?></div>
                                <?php endif; ?>
                                <?php if( !empty($item['_kcg_strategy_btn']) ) : ?>
                                    <a <?php echo kcg__link($item['_kcg_strategy_link']); ?> class="button b-white b-marginT">
                                    <div class="wrapper">
                                        <span class="text"><?php echo $this->parse_text_editor($item['_kcg_strategy_btn']); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col col-6">
                            <?php if( !empty($item['_kcg_strategy_image']['url']) ) : ?>
                                <div class="image-services is-stratetgy">
                                    <img src="<?php echo esc_url($_image); ?>" alt="<?php echo get_post_meta($item['_kcg_strategy_bgc']['id'], '_wp_attachment_image_alt', true); ?>" />
                                </div>
                             <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php elseif($item['_kcg_strategy_layout'] == 'style_one'): ?>
                <div class="infos" data-color="<?php echo esc_attr($sec_bg); ?>" id="slide-2">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                        <div class="col col-9">
                            <?php if( !empty($item['_kcg_strategy_title']) ) : ?>
                                    <div class="caption c-white"><span><?php echo $this->parse_text_editor($item['_kcg_strategy_title']); ?></span></div>
                                <?php endif; ?>
                                <?php if( !empty($item['_kcg_strategy_subtitle']) ) : ?>
                                    <h3 class="subtitle sb-right sb-white" ><?php echo $this->parse_text_editor($item['_kcg_strategy_subtitle']); ?></h3>
                                <?php endif; ?>
                                <?php if( !empty($item['_kcg_strategy_text']) ) : ?>
                                    <div class="paragraph p-white"><?php echo $this->parse_text_editor($item['_kcg_strategy_text']); ?></div>
                                <?php endif; ?>
                        </div>
                        </div>
                    </div>
                </div>
                <?php elseif($item['_kcg_strategy_layout'] == 'style_two'): ?>
                <div class="infos" data-color="<?php echo esc_attr($sec_bg); ?>" id="slide-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                        <div class="col col-9">
                            <div class="services-items">
                                <?php 
                                    if ( empty( $settings['_kcg_strategy_lists'] ) ) {
                                            return;
                                        }
                                    $i = 1;
                                    foreach ( $settings['_kcg_strategy_lists'] as $item ) : 
                                ?>
                                <div class="item">
                                    <div class="wrapper">
                                    <?php if (!empty($item['_kcg_strategy_bx_title'])): ?>
                                        <div class="si-type"><?php echo $this->parse_text_editor($item['_kcg_strategy_bx_title']); ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($item['_kcg_strategy_bx_text'])): ?>
                                        <?php echo $this->parse_text_editor($item['_kcg_strategy_bx_text']); ?>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endif; endforeach; ?>
            </div>
        <?php
        $this->__close_wrap();
    }
    
}
