<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Strategy_Menu extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-strategy-menu';
    }

    public function get_title(){
        return esc_html__( 'Strategy Menu', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-menu-bar';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'strategy menu', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_strategy_menu_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_strategy_menu_section',
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
        $this->add_control(
            '_kcg_strategy_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'It all begins<br>with an idea.', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_subtitle',
            [
                'label' => 'Sub Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'STRATEGY', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter sub title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Download', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
			'_kcg_strategy_file',
			[
				'label' => esc_html__( 'Choose File', 'kcg' ),
				'type' => Controls_Manager::MEDIA,
				'media_type' => 'video',
				'dynamic' => ['active'   => true,],
				'condition' => [
                    '_kcg_strategy_btn!' => ''
                ]
			]
		);
        $this->add_control(
            '_kcg_strategy_img', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
        $this->add_control(
            '_kcg_strategy_bg_img', [
                'label' => __('Background Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose background image (or) Leave it empty to hide.', 'kcg'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $_img = !empty($settings['_kcg_strategy_img']) ? $settings['_kcg_strategy_img']['url'] : '';
        $bg_img = !empty($settings['_kcg_strategy_bg_img']) ? $settings['_kcg_strategy_bg_img']['url'] : '';
        $this->__open_wrap();
        ?>
        <div class="webdoor w-service" style="background-image:url(<?php echo esc_url($bg_img); ?>);" data-scroll-section>
            <div class="submenu sb-white">
                <?php 
                $i = 1;
                    $service_menu_id = kcg_options('service_menu_id', '');
                    foreach ($service_menu_id as $menu_item):
                        $active_class =  ($i == 2) ? 'active' : '';
                ?>
                    <a href="<?php echo esc_url($menu_item['url']); ?>" class="item <?php echo esc_attr($active_class); ?>" data-scroll data-scroll-speed="1"><span><?php echo esc_html($menu_item['title']); ?></span></a>
                <?php $i++; endforeach; ?>
            </div>
            <div class="inner">
                <div class="col col-1">
                    <a href="#" onclick="window.history.back();" class="button b-icon">
                        <div class="wrapper">
                            <div class="background"></div>
                            <div class="arrow svg a-left"></div>
                        </div>
                    </a>
                </div>
                <div class="col col-3">
                <?php if( !empty($settings['_kcg_strategy_subtitle']) ) : ?>
                    <div class="caption c-white" data-scroll data-scroll-speed="1"><span><?php echo $this->parse_text_editor($settings['_kcg_strategy_subtitle']); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if( !empty($settings['_kcg_strategy_title']) ) : ?>
                    <h1 class="title t-medium t-white" data-scroll data-scroll-speed="1"><strong><?php echo $this->parse_text_editor($settings['_kcg_strategy_title']); ?></strong></h1>
                    <?php endif; ?>
                    <?php if( !empty($settings['_kcg_strategy_text']) ) : ?>
                    <p class="paragraph p-white"><?php echo $this->parse_text_editor($settings['_kcg_strategy_text']); ?></p>
                    <?php endif; ?>
                    <?php if( !empty($settings['_kcg_strategy_btn']) ) : 
                        $dfile = !empty($settings['_kcg_strategy_file']) ? $settings['_kcg_strategy_file']['url'] : '';
                        ?>
                    <a href="<?php echo esc_url($dfile); ?>" class="button b-icon b-marginT" download>
                        <span class="label"><?php echo $this->parse_text_editor($settings['_kcg_strategy_btn']); ?></span>
                        <div class="wrapper">
                            <div class="background"></div>
                            <div class="arrow svg a-45"></div>
                        </div>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="col col-7">
                <?php if( !empty($settings['_kcg_strategy_img']) ) : ?>
                    <div class="image-services" data-scroll data-scroll-speed="1">
                        <figure style="background-image: url(<?php echo esc_url($_img); ?>);"></figure>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col col-1"></div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
