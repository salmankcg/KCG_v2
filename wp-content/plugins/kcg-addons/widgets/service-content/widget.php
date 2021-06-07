<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Service_Content extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-service-content';
    }

    public function get_title(){
        return esc_html__( 'Service Content', 'kcg' );
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
            '_kcg_service_main_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_service',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_one' => 'Style One',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_home_section_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_service_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Strategy', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_service_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_service_content',
            [
                'label' => 'Content',
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Enter Text here', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter content (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_service_icon',
            [
                'label' => 'Icon Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'i-stg', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter icon name (or) Leave it empty to hide.', 'kcg' ),
                'description' => __( 'Enter icon name (Ex: i-stg, i-pdt, i-mktg) (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_service_btn',
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
            '_kcg_service_link',
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
            '_kcg_service_style_section',
            [
                'label' => __( 'General', 'kcg' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_kcg_service_section_bg',
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
        $sec_bg = isset($settings['_kcg_service_section_bg']) && !empty($settings['_kcg_service_section_bg']) ? $settings['_kcg_service_section_bg'] : '#2D3294';
        
        $this->__open_wrap();
        ?>
        <?php if ($settings['_kcg_design_service'] == 'default'): 
           
            ?>
             <div class="services-content sv-full" style="background-color:<?php echo esc_attr($sec_bg); ?>" data-scroll-section>
                <div class="s-wrapper">
                    <div class="infos">
                        <?php if (!empty($settings['_kcg_service_title'])): ?>
                            <span class="type"><?php echo $this->parse_text_editor($settings['_kcg_service_title']); ?></span>
                        <?php endif; ?>
                         <?php if (!empty($settings['_kcg_service_text'])): ?>
                        <p class="paragraph p-white"><?php echo $this->parse_text_editor($settings['_kcg_service_text']); ?></p>
                         <?php endif; ?>
                         <?php if (!empty($settings['_kcg_service_btn'])): ?>
                        <a href="<?php echo esc_url($settings['_kcg_service_link']['url']);?>" class="button">
                            <div class="wrapper">
                                <div class="background"></div>
                                <span class="text"><?php echo $this->parse_text_editor($settings['_kcg_service_btn']); ?></span>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                     <?php if (!empty($settings['_kcg_service_icon'])): ?>
                    <div class="ico svg <?php echo esc_attr($settings['_kcg_service_icon']); ?>"></div>
                    <?php endif; ?>
                     <?php if (!empty($settings['_kcg_service_content'])): ?>
                    <div class="list">
                        <?php echo $this->parse_text_editor($settings['_kcg_service_content']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php $this->__close_wrap();?>
    <?php }
    
}
