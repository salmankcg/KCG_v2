<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Approach extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-approach';
    }

    public function get_title(){
        return esc_html__( 'Approach', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-text';
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
            '_kcg_approach_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_approach_section',
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
            '_kcg_about_client_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_approach_heading',
            [
                'label' => 'Heading',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '<strong>Our innovate approach is centered<br>around three distinct phases</strong>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
    
         $repeater = new Repeater();
         $repeater->add_control(
            '_kcg_approach_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Inovate', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_approach_subtitle',
            [
                'label' => 'Sub Title',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'For businesses in their <strong>early stages</strong>.', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter sub title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_approach_content',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'We deploy thoughtful strategy, cutting-edge technology and creativity to help you get from "idea" to "empire".', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_approach_hosted_url',
            [
                'label' => esc_html__( 'Choose File', 'kcg' ),
                'type' => Controls_Manager::MEDIA,
                'media_type' => 'video',
                'dynamic' => ['active'   => true,],
            ]
        );
          $this->add_control(
            '_kcg_approach_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_approach_title' => __('Inovate','kcg'),
                        '_kcg_approach_subtitle' => __('For businesses in their <strong>early stages</strong>.','kcg'),
                        '_kcg_approach_content' => __('We deploy thoughtful strategy, cutting-edge technology and creativity to help you get from "idea" to "empire".','kcg'),
                    ],
                    [
                        '_kcg_approach_title' => __('Create','kcg'),
                        '_kcg_approach_subtitle' => __('For businesses that are ready to launch.','kcg'),
                        '_kcg_approach_content' => __('We enable you to make your mark on the industry and target market in way that is considered, genuine and truly "you".','kcg'),
                    ],
                    [
                        '_kcg_approach_title' => __('Expand','kcg'),
                        '_kcg_approach_subtitle' => __('For businesses that are <strong>established</strong>.','kcg'),
                        '_kcg_approach_content' => __('We help you take on the world by ensuring your journey is efficient, optimized and strategically outstanding. Anything is possible.','kcg'),
                    ],
                ],
                'title_field' => '{{ _kcg_approach_title }}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $this->__open_wrap();
        ?>
        <div class="webdoor w-approach">
            <div class="submenu sb-white">
                <?php 
                    $i = 1;
                        $about_menu_id = kcg_options('about_menu_id', '');
                        foreach ($about_menu_id as $menu_item):
                            $active_class =  ($i == 2) ? 'active' : '';
                    ?>
                        <a href="<?php echo esc_url($menu_item['url']); ?>" class="item <?php echo esc_attr($active_class); ?>"><span><?php echo esc_html($menu_item['title']); ?></span></a>
                <?php $i++; endforeach; ?>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center">

                    <div class="col col-10">
                    <?php if (!empty($settings['_kcg_approach_heading'])): ?>
                        <h1 class="title t-medium t-white t-center"><?php echo $this->parse_text_editor($settings['_kcg_approach_heading']); ?></h1>
                    <?php endif; ?>

                    <div class="approach">
                    <?php 
                        if ( empty( $settings['_kcg_approach_items'] ) ) {
                                return;
                            }
                        $i = 1;
                        foreach ( $settings['_kcg_approach_items'] as $item ) : 
                            $icon = 'telescope';
                            if($i == 1){
                                $icon = 'telescope';
                            }elseif($i == 2){
                                $icon = 'rocket';
                            }elseif($i == 3){
                                $icon = 'astronaut';
                            }else{
                                $icon = 'telescope';
                            }
                    ?>
                        <div class="item" data-video="approach-<?php echo esc_attr($i);?>">
                            <div class="wrapper">
                                <div class="icon">
                                <div class="i-<?php echo esc_attr($icon);?> svg"></div>
                                </div>
                                <?php if (isset($item['_kcg_approach_title']) && !empty($item['_kcg_approach_title'])): ?>
                                    <h3><?php echo $this->parse_text_editor($item['_kcg_approach_title']); ?></h3> 
                                <?php endif ?>
                                <?php if (isset($item['_kcg_approach_subtitle']) && !empty($item['_kcg_approach_subtitle'])): ?>
                                    <span><?php echo $this->parse_text_editor($item['_kcg_approach_subtitle']); ?></span>
                                <?php endif ?>
                                <?php if (isset($item['_kcg_approach_content']) && !empty($item['_kcg_approach_content'])): ?>
                                    <p class="paragraph p-white"><?php echo $this->parse_text_editor($item['_kcg_approach_content']); ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>
                    </div>
                    </div>
                    
                </div>
            </div>

            <div class="video-background">
                <?php 
                    if ( empty( $settings['_kcg_approach_items'] ) ) {
                        return;
                    }
                    $j = 1;
                    foreach ( $settings['_kcg_approach_items'] as $item ) : 
                ?>                
                <?php if (isset($item['_kcg_approach_hosted_url']) && !empty($item['_kcg_approach_hosted_url']['url'])): ?>
                    <div class="video" data-target="approach-<?php echo esc_attr($j);?>">
                        <video loop muted><source src="<?php echo esc_url($item['_kcg_approach_hosted_url']['url']); ?>" type="video/mp4"></video>
                    </div>
                <?php endif ?>
                <?php $j++; endforeach; ?>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
