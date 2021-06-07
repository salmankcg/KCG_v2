<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;


class Services extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-services';
    }

    public function get_title(){
        return esc_html__( 'Services', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-globe';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'globe', 'kcg globe', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            '_kcg_services_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        
        $repeater = new Repeater();

        $repeater->add_control(
            '_kcg_services_title',
            [
                'label' => 'Title & Description',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('Strategy', 'kcg'),
                'placeholder' => __('Enter your title', 'kcg'),
                'description' => __('If the field is empty, title will not be shown.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_services_desc',
            [
                'label' => __('Description', 'kcg'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'rows' => 10,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg'),
                'placeholder' => __('Enter your description', 'kcg'),
                'description' => __('If the field is empty, description will not be shown.', 'kcg'),
            ]
        );
        $repeater->add_control(
            '_kcg_services_text',
            [
                'label' => 'Content',
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'rows' => 10,
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('', 'kcg'),
                'placeholder' => __('Enter your content', 'kcg'),
                'description' => __('If the field is empty, content will not be shown.', 'kcg'),
            ]
        );
        
        $repeater->add_control(
            '_kcg_services_ic',
            [
                'label' => 'Icon Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'i-stg', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter icon name', 'kcg' ),
                'description' => __( 'Enter icon name (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
            '_kcg_services_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'READ MORE', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text', 'kcg' ),
                'description' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $repeater->add_control(
            '_kcg_services_link',
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
                    '_kcg_services_btn!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
            ]
        );
        $repeater->add_control(
          '_kcg_services_bgc',
          [
              'label' => __('Background Color', 'auspicious'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
          ]
      );
        $this->add_control(
            '_kcg_services_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_services_title' => __( 'Strategy', 'kcg' ),
                        '_kcg_services_desc' => __( 'It all begins with an idea. We help businesses we believe in to take their idea from the drawing board to the board room.', 'kcg' ),
                        '_kcg_services_text' => __( '• Research & Discovery<br> • Business Consultancy<br> • Digital Transformation<br> • Branding', 'kcg' ),
                        '_kcg_services_ic'    => 'i-stg',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                        '_kcg_services_bgc'    => '#2D3294'
                    ],
                    [
                        '_kcg_services_title' => __( 'Product', 'kcg' ),
                        '_kcg_services_desc' => __( 'Designing and delivering products to help you change the world.', 'kcg' ),
                        '_kcg_services_text' => __( '• Research & Discovery<br> • Business Consultancy<br> • Digital Transformation<br> • Branding', 'kcg' ),
                        '_kcg_services_ic'    => 'i-pdt',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                        '_kcg_services_bgc'    => '#4C9F91'
                    ],
                    [
                        '_kcg_services_title' => __( 'Marketing', 'kcg' ),
                        '_kcg_services_desc' => __( 'Your story matters. Our brand development specialism ensures that your story gets told.', 'kcg' ),
                        '_kcg_services_text' => __( '• Research & Discovery<br> • Business Consultancy<br> • Digital Transformation<br> • Branding', 'kcg' ),
                        '_kcg_services_ic'    => 'i-mktg',
                        '_kcg_services_btn'    => 'READ MORE',
                        '_kcg_services_link' => [
                            'url' => '#',
                        ],
                        '_kcg_services_bgc'    => '#B27EE4'
                    ],
                ],
                
                'title_field' => '{{ _kcg_services_title }}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_menu_section',
            [
                'label' => __( 'Menu Content', 'kcg' ),
            ]
        );
        $this->add_control(
          '_kcg_services_subtitle',
          [
              'label' => 'Title',
              'type' => Controls_Manager::TEXT,
              'label_block' => true,
              'show_label' => true,
              'dynamic' => [
                  'active' => true,
              ],
              'default' => __('We solve complex business challenges with strategy and marketing, delivering products.', 'kcg'),
              'placeholder' => __('Enter sub title', 'kcg'),
              'description' => __('If the field is empty, title will not be shown.', 'kcg'),
          ]
      );
        $repeater_menu = new Repeater();
        $repeater_menu->add_control(
            '_kcg_menu_name',
            [
                'label' => 'Name & Url',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('STRATEGY', 'kcg'),
                'placeholder' => __('Enter menu name', 'kcg'),
                'description' => __('If the field is empty, menu name will not be shown.', 'kcg'),
            ]
        );
        $repeater_menu->add_control(
            '_kcg_menu_link',
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
                    '_kcg_menu_name!' => '',
                ],
                'placeholder' => __('https://your-link.com', 'kcg'),
                "description" => __("Enter link (or) Leave it to apply default.", 'kcg'),
            ]
        );
        
        $this->add_control(
            '_kcg_services_maps',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater_menu->get_controls(),
                'default' => [
                    [
                        '_kcg_menu_name' => __( 'STRATEGY', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                    [
                        '_kcg_menu_name' => __( 'PRODUCT', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                    [
                        '_kcg_menu_name' => __( 'MARKETING', 'kcg' ),
                        '_kcg_menu_link' => [
                            'url' => "#",
                        ],
                    ],
                ],
                
                'title_field' => '{{ _kcg_menu_name }}',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 1 );
        
        $this->__open_wrap();
        ?>
        <div class="services-content sc-slides">
            <div class="services-bckg"></div>
                <div class="infos" data-color="#FFFFFF" id="slide-1">
                <?php if ( !empty( $settings['_kcg_services_maps'] ) ) : ?>
                <div class="submenu">
                    <?php 
                        foreach ($settings['_kcg_services_maps'] as $menu_item):
                    ?>
                    <a <?php echo kcg__link($menu_item['_kcg_menu_link']); ?> class="item"><span><?php echo esc_html($menu_item['_kcg_menu_name']); ?></span></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            <div class="container-fluid">
                <?php if ( !empty( $settings['_kcg_services_subtitle'] ) ) : ?>
                  <div class="row justify-content-center">
                      <div class="col col-7">
                          <h1 class="title t-medium t-center"><strong><?php echo esc_html($settings['_kcg_services_subtitle']); ?></strong></h1>
                      </div>
                  </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col col-10">
                        <div class="services-icons">
                          <?php 
                                if ( empty( $settings['_kcg_services_list'] ) ) {
                                        return;
                                    }
                                $i = 2;
                                foreach ( $settings['_kcg_services_list'] as $item ) : 
                            ?>
                            <div class="item" data-target="slide-<?php echo esc_attr($i); ?>">
                                <?php if ( !empty( $item['_kcg_services_ic'] ) ) : ?>
                                  <div class="ico svg i-black <?php echo esc_attr($item['_kcg_services_ic']); ?>"></div>
                                <?php endif; ?>
                                <?php if ( !empty( $item['_kcg_services_title'] ) ) : ?>
                                  <span><?php echo esc_html($item['_kcg_services_title']); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php 
                if ( empty( $settings['_kcg_services_list'] ) ) {
                        return;
                    }
                $j = 2;
                foreach ( $settings['_kcg_services_list'] as $item ) : 
            ?>
              <div class="infos" data-color="<?php echo esc_attr($item['_kcg_services_bgc']); ?>" id="slide-<?php echo esc_attr($i); ?>">
                  <div class="container-fluid">
                      <div class="row justify-content-center">
                      <div class="col col-3">
                          <?php if ( !empty( $item['_kcg_services_title'] ) ) : ?>
                            <span class="type"><?php echo esc_html($item['_kcg_services_title']); ?></span>
                          <?php endif; ?>
                          <?php if ( !empty( $item['_kcg_services_desc'] ) ) : ?>
                            <div class="paragraph p-white"><?php echo $this->parse_text_editor($item['_kcg_services_desc']); ?></div>
                          <?php endif; ?>
                          <?php if ( !empty( $item['_kcg_services_btn'] ) ) : ?>
                          <a <?php echo kcg__link($item['_kcg_services_link']); ?> class="button b-white">
                            <div class="wrapper">
                                <span class="text"><?php echo $this->parse_text_editor($item['_kcg_services_btn']); ?></span>
                            </div>
                          </a>
                          <?php endif; ?>
                      </div>
                      <div class="col col-3">
                          <div class="ico svg <?php echo esc_attr($item['_kcg_services_ic']); ?>"></div>
                      </div>
                      <div class="col col-3">
                          <div class="list">
                          <?php if ( !empty( $item['_kcg_services_text'] ) ) : ?>
                            <?php echo $this->parse_text_editor($item['_kcg_services_text']); ?>
                          <?php endif; ?>
                          </div>
                      </div>
                      </div>
                  </div>
              </div>
            <?php $j++; endforeach; ?>
        </div>
        <?php $this->__close_wrap();?>
    <?php }
    
}
