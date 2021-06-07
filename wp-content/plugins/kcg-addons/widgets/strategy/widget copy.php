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
        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_strategy_bx_content',
            [
                'label' => __( 'Box Content', 'kcg' ),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            '_kcg_strategy_title',
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
        
        $repeater->add_control(
            '_kcg_strategy_text',
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
        $repeater->add_control(
            '_kcg_strategy_btns',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Download Pdf', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
			'_kcg_strategy_files',
			[
				'label' => esc_html__( 'Choose File', 'kcg' ),
				'type' => Controls_Manager::MEDIA,
				'media_type' => 'video',
				'dynamic' => ['active'   => true,],
				'condition' => [
                    '_kcg_strategy_btns!' => ''
                ]
			]
		);
        $this->add_control(
            '_kcg_strategy_lists',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_strategy_title' => __('Research & Discovery', 'kcg'),
                    ],
                    [
                        '_kcg_strategy_title' => __('Business Consultancy', 'kcg'),
                    ],
                    [
                        '_kcg_strategy_title' => __('Business Consultancy', 'kcg'),
                    ],
                    [
                        '_kcg_strategy_title' => __('Digital Go to Market', 'kcg'),
                    ],
                ],
                'title_field' => '{{ _kcg_strategy_title }}',
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
        $sec_bg = isset($settings['_kcg_strategy_section_bg']) && !empty($settings['_kcg_strategy_section_bg']) ? $settings['_kcg_strategy_section_bg'] : '#2D3294';
        $this->__open_wrap();
        ?>
        <div class="services-content sv-full" style="background-color:<?php echo esc_attr($sec_bg); ?>" data-scroll-section>
            <div class="inner">
                <div class="col col-12">
                    <div class="services-items">
                    <?php 
                         if ( empty( $settings['_kcg_strategy_lists'] ) ) {
                                return;
                            }
                        $i = 1;
                        foreach ( $settings['_kcg_strategy_lists'] as $item ) : 
                        ?>
                        <div class="item">
                            <?php if (!empty($item['_kcg_strategy_title'])): ?>
                                <div class="si-type"><?php echo $this->parse_text_editor($item['_kcg_strategy_title']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($item['_kcg_strategy_text'])): ?>
                                <?php echo $this->parse_text_editor($item['_kcg_strategy_text']); ?>
                            <?php endif; ?>
                            <?php if( !empty($item['_kcg_strategy_btns']) ) : 
                                $dfile = !empty($item['_kcg_strategy_files']) ? $item['_kcg_strategy_files']['url'] : '';
                                ?>
                            <a href="<?php echo esc_url($dfile); ?>" class="button b-icon" download>
                                <span class="label"><?php echo $this->parse_text_editor($item['_kcg_strategy_btns']); ?></span>
                                <div class="wrapper">
                                    <div class="background"></div>
                                    <div class="arrow svg a-45"></div>
                                </div>
                            </a>
                            <?php endif; ?>
                            
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
