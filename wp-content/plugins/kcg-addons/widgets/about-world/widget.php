<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class About_World extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-about-world';
    }

    public function get_title(){
        return esc_html__( 'About World', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-globe';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'about world', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_about_image_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_about_image_section',
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
            '_kcg_about_img_image',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_about_img_txt',
            [
                'label' => 'Title Text',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Enter content here', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater = new Repeater();
         $repeater->add_control(
            '_kcg_ab_location',
            [
                'label' => __('Country & Image', 'kcg'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __('Barcelona', 'kcg'),
                'placeholder' => __('Enter your location', 'kcg'),
                'description' => __('If the field is empty, location will not be shown.', 'kcg'),
            ]
        );
         $repeater->add_control(
            '_kcg_ab_img', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => false,
                'description' => __('Please choose image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         
          $this->add_control(
            '_kcg_about_images',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
          $this->add_group_control(
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
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="webdoor w-about">
            <div class="submenu">
                <?php 
                    $i = 1;
                        $about_menu_id = kcg_options('about_menu_id', '');
                        foreach ($about_menu_id as $menu_item):
                            $active_class =  ($i == 1) ? 'active' : '';
                    ?>
                    <a href="<?php echo esc_url($menu_item['url']); ?>" class="item <?php echo esc_attr($active_class); ?>"><span><?php echo esc_html($menu_item['title']); ?></span></a>
                <?php $i++; endforeach; ?>
            
            </div>
            <?php if (!empty($settings['_kcg_about_img_txt'])): ?>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col col-10">
                        <h1 class="title t-medium t-center"><strong><?php echo $this->parse_text_editor($settings['_kcg_about_img_txt']); ?></strong></h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if( !empty($settings['_kcg_about_images']) ) : ?>
            <div class="about-world">
                <div class="aw-people">
                    <div class="aw-content">
                    <?php foreach ( $settings['_kcg_about_images'] as $item ) :
                        if( !empty($item['_kcg_ab_img']['url']) ) : 
                            $image = wp_get_attachment_image_url( $item['_kcg_ab_img']['id'], $settings['thumbnail_size'] );
                        ?>
                            <div class="item" data-place="<?php echo $this->parse_text_editor($item['_kcg_ab_location']); ?>">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta($item['_kcg_ab_img']['id'], '_wp_attachment_image_alt', true); ?>" />
                            </div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
        $this->__close_wrap();
    }
    
}
