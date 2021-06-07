<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Page_Title extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-page_title';
    }

    public function get_title(){
        return esc_html__( 'Page Title', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-title';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'Page Title', 'title', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_page_title_preset',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_page_title_section',
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
            '_kcg_page_title_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_page_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
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
            '_kcg_page_menu',
            [
                'label' => __( 'Show Page Menu', 'kcg' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'kcg' ),
                'label_off' => __( 'No', 'kcg' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __( 'Enable to show page menu (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="webdoor w-legals">
            <?php if(isset($settings['_kcg_page_menu']) && !empty($settings['_kcg_page_menu'])) : ?>
                <div class="submenu">
                    <?php 
                        $i = 1;
                            $page_menu_id = kcg_options('page_menu_id', '');
                            foreach ($page_menu_id as $menu_item):
                                //$active_class = is_page('privacy') || is_page('cookies') ? 'active' : '';
                             
                        ?>
                            <a href="<?php echo esc_url($menu_item['url']); ?>" class="item "><span><?php echo esc_html($menu_item['title']); ?></span></a>
                        <?php $i++; endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if(isset($settings['_kcg_page_title']) && !empty($settings['_kcg_page_title'])) : ?>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-9">
                    <h1 class="title t-medium t-center"><strong><?php echo $this->parse_text_editor($settings['_kcg_page_title']); ?></strong></h1>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        
        <?php
        $this->__close_wrap();
    }
    
}
