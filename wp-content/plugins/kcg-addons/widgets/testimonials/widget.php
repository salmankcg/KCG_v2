<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Testimonials extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-testimonials';
    }

    public function get_title(){
        return esc_html__( 'Testimonials', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post-slider';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'testimonials', 'slider', 'sliders', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_tsm_preset',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_tsm',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Default',
                    'style_one' => 'Style One',
                    'style_two' => 'Style Two',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_tsm_content_section',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_custom_tsm',
            [
                'label' => esc_html__( 'Choose Type', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Custom',
                    'by_custom_post' => 'By Post Type',
                ],
                'default' => 'default',
            ]
        );
         $repeater = new Repeater();
         
         $repeater->add_control(
            '_kcg_slider_name',
            [
                'label' => 'Name',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Saul Tessler', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter client name (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_slider_deg',
            [
                'label' => 'Designation',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'Chief Executive Officer', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter client designation (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_slider_msg',
            [
                'label' => 'Message',
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter client message (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $repeater->add_control(
            '_kcg_slider_image', [
                'label' => __('Image', 'kcg'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'show_label' => true,
                'description' => __('Please choose client image (or) Leave it empty to hide.', 'kcg'),
            ]
        );
         $repeater->add_group_control(
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
         
          $this->add_control(
            '_kcg_sliders',
            [
                'type' => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        '_kcg_slider_name' => __( 'Saul Tessler', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Chief Executive Officer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Ksenija', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Finance Manager', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Salman Ahmed', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Head of Technology', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Nathan', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Designer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Andrea', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Designer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Emily', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Writer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Praveen', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Software Engineer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Milda', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Digital Marketing Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Nicolai', 'kcg' ),
                        '_kcg_slider_deg' => __( 'System Adminstrator', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Mythili', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Social Media Marketing Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Natalie', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Digital Transformation Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Djordje', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Designer & Programmer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Glen', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Honorary For Life', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Anthony', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Honorary For Life', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Kate', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Digital Transformation Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Filipa', 'kcg' ),
                        '_kcg_slider_deg' => __( 'The Fixer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'James', 'kcg' ),
                        '_kcg_slider_deg' => __( 'SEO Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Gaby', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Writer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Cecilia', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Writer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Pepita', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Marketing Extraordinaire', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Alice', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Project Manager', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Liviu', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Digital Marketing Specialist', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Selina', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Designer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Satyam', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Web Developer & Designer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        '_kcg_slider_name' => __( 'Abu Sayed Russell', 'kcg' ),
                        '_kcg_slider_deg' => __( 'Sr. WordPress Developer', 'kcg' ),
                        '_kcg_slider_msg' => __( '"You\'re probably luckier to have them<br>than they are to have you."', 'kcg' ),
                        '_kcg_slider_image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'condition' => [
                    '_kcg_custom_tsm' => ['default']
                ],
                'title_field' => '{{ _kcg_slider_name }}',
            ]
        );
        $this->add_control(
            '_kcg_tms_order_by',
            [
                'label' => __('Order By', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'modified' => __('Modified', 'kcg'),
                    'date' => __('Date', 'kcg'),
                    'rand' => __('Rand', 'kcg'),
                    'ID' => __('ID', 'kcg'),
                    'title' => __('Title', 'kcg'),
                    'author' => __('Author', 'kcg'),
                    'name' => __('Name', 'kcg'),
                    'parent' => __('Parent', 'kcg'),
                    'menu_order' => __('Menu Order', 'kcg'),
                ],
                'condition' => [
                    '_kcg_custom_tsm' => ['by_custom_post']
                ],
            ]
        );
         $this->add_control(
            '_kcg_tms_order',
            [
                'label' => __('Order', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ase',
                'options' => [
                    'ase' => __('Ascending Order', 'kcg'),
                    'desc' => __('Descending Order', 'kcg'),
                ],
                'condition' => [
                    '_kcg_custom_tsm' => ['by_custom_post']
                ],
            ]
        );
         $this->add_control(
            '_kcg_tms_per_page', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 10,
                'condition' => [
                    '_kcg_custom_tsm' => ['by_custom_post']
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $class_style = '';
        if(!empty($settings['_kcg_design_tsm']) && $settings['_kcg_design_tsm'] == 'style_one'){
            $class_style = 'services-content';
        }elseif(!empty($settings['_kcg_design_tsm']) && $settings['_kcg_design_tsm'] == 'style_two'){
            $class_style = 'services-content sc-testimonials';
        }else{
            $class_style = 'about-content';
        }
        $this->__open_wrap();
       
        ?>
         <div class="<?php echo esc_attr($class_style); ?>">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-9 c-testimonial">
                        <div class="testimonial">
                            <div class="slides">
                            <?php if($settings['_kcg_custom_tsm'] == 'default'): ?>
                            <?php 
                             if ( !empty( $settings['_kcg_sliders'] ) ) :
                                $count = 1;
                                foreach ( $settings['_kcg_sliders'] as $item ) : 
                            ?>
                                <div class="item">
                                    <div class="wrapper">
                                    <div class="stars svg"></div> 
                                    <?php if(isset($item['_kcg_slider_msg']) && !empty($item['_kcg_slider_msg'])) : ?>
                                        <p class="phrase"><?php echo $this->parse_text_editor($item['_kcg_slider_msg']); ?></p>
                                    <?php endif; ?> 
                                    
                                    <div class="info">
                                        <?php if(isset($item['_kcg_slider_image']['url']) && !empty($item['_kcg_slider_image']['url'])) : 
                                            $image = wp_get_attachment_image_url( $item['_kcg_slider_image']['id'], $item['thumbnail_size'] );
                                            ?>
                                        <img class="photo" src="<?php echo esc_url($image); ?>" alt="<?php echo get_post_meta($item['_kcg_slider_image']['id'], '_wp_attachment_image_alt', true); ?>" />
                                        <?php endif; ?>
                                        <?php if(isset($item['_kcg_slider_name']) && !empty($item['_kcg_slider_name'])) : ?>
                                        <span class="name"><?php echo $this->parse_text_editor($item['_kcg_slider_name']); ?></span>
                                        <?php endif; ?>
                                        <?php if(isset($item['_kcg_slider_deg']) && !empty($item['_kcg_slider_deg'])) : ?>
                                        <span class="occupation"><?php echo $this->parse_text_editor($item['_kcg_slider_deg']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </div>
                            <?php endforeach; endif; ?>
                            <?php else: 
                            $order_by = !empty($settings['_kcg_blog_order_by']) ? $settings['_kcg_blog_order_by'] : 'date';
                            $order = !empty($settings['_kcg_blog_order']) ? $settings['_kcg_blog_order'] : 'asc';
                            $per_page = !empty($settings['_kcg_blog_per_page']) ? $settings['_kcg_blog_per_page'] : 10;
                            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                            $args = array(
                                'post_type'   => 'kcg_testimonial',
                                'post_status' => 'publish',
                                'ignore_sticky_posts' => 1,
                                'orderby'             => $order_by,
                                'order'               => $order,
                                'posts_per_page'      => $per_page,
                                'paged' => $paged,
                            );
                            $tms_query = new \WP_Query( $args );
                                $role = get_post_meta( get_the_ID(), '_kcg_tsm_role', true );
                                while ( $tms_query->have_posts() ) : $tms_query->the_post();
                                    
                                ?>
                            
                                <div class="item">
                                    <div class="wrapper">
                                    <div class="stars svg"></div> 
                                    <p class="phrase"><?php echo $this->parse_text_editor(the_content()); ?></p> 
                                    
                                    <div class="info">
                                    <?php 
                                    if ( has_post_thumbnail() ) : 
                                            the_post_thumbnail('', ['class' => 'photo']); 
                                    endif; 
                                ?>
                                    <span class="name"><?php the_title(); ?></span>
                                    <span class="occupation"><?php echo esc_html($role); ?></span>
                                    </div>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); endif;?>
                            </div>
                            <div class="button b-black b-icon t-prev">
                            <div class="wrapper">
                                <div class="arrow svg a-left "></div>
                            </div>
                            </div>
                            <div class="button b-black b-icon t-next">
                            <div class="wrapper">
                                <div class="arrow svg a-right "></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
