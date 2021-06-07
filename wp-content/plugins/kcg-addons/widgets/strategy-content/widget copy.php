<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Strategy_Content extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-strategy-content';
    }

    public function get_title(){
        return esc_html__( 'Strategy Content', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-content';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'text', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_strategy_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_strategy',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
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
            '_kcg_strategy_c_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Read More', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_strategy_c_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
            ]
        );
        $this->end_controls_section();
         $this->start_controls_section(
            '_kcg_strategy_c_style_section',
            [
                'label' => __( 'General', 'kcg' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_kcg_strategy_c_section_bg',
            [
                'label' => __('Background Color', 'kcg'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 1 );
        $sec_bg = isset($settings['_kcg_strategy_c_section_bg']) && !empty($settings['_kcg_strategy_c_section_bg']) ? $settings['_kcg_strategy_c_section_bg'] : '#2D3294';
        
        $this->__open_wrap();
        ?>
        <?php if ($settings['_kcg_design_strategy_c'] == 'default'): 
           
            ?>
             <div class="strategy_cs-content sv-full" style="background-color:<?php echo esc_attr($sec_bg); ?>" data-scroll-section>
                <div class="s-wrapper">
                    <div class="infos">
                        <?php if (!empty($settings['_kcg_strategy_c_title'])): ?>
                            <span class="type"><?php echo $this->parse_text_editor($settings['_kcg_strategy_c_title']); ?></span>
                        <?php endif; ?>
                         <?php if (!empty($settings['_kcg_strategy_c_text'])): ?>
                        <p class="paragraph p-white"><?php echo $this->parse_text_editor($settings['_kcg_strategy_c_text']); ?></p>
                         <?php endif; ?>
                         <?php if (!empty($settings['_kcg_strategy_c_btn'])): ?>
                        <a href="<?php echo esc_url($settings['_kcg_strategy_c_link']['url']);?>" class="button">
                            <div class="wrapper">
                                <div class="background"></div>
                                <span class="text"><?php echo $this->parse_text_editor($settings['_kcg_strategy_c_btn']); ?></span>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                     <?php if (!empty($settings['_kcg_strategy_c_icon'])): ?>
                    <div class="ico svg <?php echo esc_attr($settings['_kcg_strategy_c_icon']); ?>"></div>
                    <?php endif; ?>
                     <?php if (!empty($settings['_kcg_strategy_c_content'])): ?>
                    <div class="list">
                        <?php echo $this->parse_text_editor($settings['_kcg_strategy_c_content']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php $this->__close_wrap();?>
    <?php }
    
}
