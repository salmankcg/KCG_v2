<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Page_Text extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-page_text';
    }

    public function get_title(){
        return esc_html__( 'Page Text', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-title';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'Page text', 'text', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_page_text_preset',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_page_text_section',
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
            '_kcg_page_text_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_page_text_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Page Title', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter page title', 'kcg' ),
                'description' => __( 'Enter page title (or) Leave it empty to hide.', 'kcg' ),
            ]
        ); 
        $this->add_control(
            '_kcg_page_text_des',
            [
                'label' => __( 'Description', 'kcg' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __( 'Default description', 'kcg' ),
                'description' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="legals-content">
            <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col col-7">
                    <?php if(isset($settings['_kcg_page_text_title']) && !empty($settings['_kcg_page_text_title'])) : ?>
                        <div class="paragraph p-bigger">
                            <?php echo $this->parse_text_editor($settings['_kcg_page_text_title']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($settings['_kcg_page_text_des']) && !empty($settings['_kcg_page_text_des'])) : ?>
                        <div class="paragraph">
                            <?php echo $this->parse_text_editor($settings['_kcg_page_text_des']); ?>
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
