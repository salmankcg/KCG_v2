<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class About_Content extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-about-content';
    }

    public function get_title(){
        return esc_html__( 'About Content', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-text';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'about content', 'about text', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_about_content_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_about_content_section',
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
            '_kcg_about_img_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_img_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Our Story', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_img_txt',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '"We imagined a workplace that prioritized bold and visionary work. So we created one."', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_about_img_txt2',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Enter content here', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text or leave it empty to hide.', 'kcg' ),
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
                    <div class="col col-9">
                        <?php if (isset($settings['_kcg_about_img_title']) && !empty($settings['_kcg_about_img_title'])): ?>
                            <div class="caption"><span><?php echo $this->parse_text_editor($settings['_kcg_about_img_title']); ?></span></div>
                        <?php endif; ?>
                        <?php if (isset($settings['_kcg_about_img_txt']) && !empty($settings['_kcg_about_img_txt'])): ?>
                            <h3 class="subtitle sb-right"><?php echo $this->parse_text_editor($settings['_kcg_about_img_txt']); ?></h3>
                        <?php endif; ?>
                        <?php if (isset($settings['_kcg_about_img_txt2']) && !empty($settings['_kcg_about_img_txt2'])): ?>
                            <div class="paragraph">
                                <?php echo $this->parse_text_editor($settings['_kcg_about_img_txt2']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
