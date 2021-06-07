<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Blog extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-blog';
    }

    public function get_title(){
        return esc_html__( 'Blog', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-post';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'blog', 'blogs', 'post', 'posts', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_blog_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_blog_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                    'style_one' => 'Style One',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_blog_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_blog_heading',
            [
                'label' => 'Heading',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'What We Do', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter heading text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_blog_btn',
            [
                'label' => 'Button Text',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( 'See All', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter button text (or) Leave it empty to hide.', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_blog_btn_link',
            [
                'label' => __( 'Link', 'kcg' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'kcg' ),
                'condition' =>[
                    '_kcg_blog_btn!' => '',
                ]
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            '_kcg_blog_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_blog_cats',
            array(
                'label' => __('Category', 'kcg'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => get_blog_categories(),
                'description' => __('Choose category (or) Leave it empty to apply theme default', 'kcg'),
            )
        );
         $this->add_control(
            '_kcg_blog_order_by',
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
                'separator' => 'before',
            ]
        );
         $this->add_control(
            '_kcg_blog_order',
            [
                'label' => __('Order', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ase',
                'options' => [
                    'ase' => __('Ascending Order', 'kcg'),
                    'desc' => __('Descending Order', 'kcg'),
                ],
            ]
        );
         $this->add_control(
            '_kcg_blog_per_page', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 5,
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        
        $args = [];
        $order_by = !empty($settings['_kcg_blog_order_by']) ? $settings['_kcg_blog_order_by'] : 'date';
        $order = !empty($settings['_kcg_blog_order']) ? $settings['_kcg_blog_order'] : 'asc';
        $per_page = !empty($settings['_kcg_blog_per_page']) ? $settings['_kcg_blog_per_page'] : 3;
        $blog_cats = !empty($settings['_kcg_blog_cats']) ? $settings['_kcg_blog_cats'] : '';
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        if(!empty($blog_cats)){
            $args = array(
                'post_type'   => 'post',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $blog_cats,
                     )
                  )
            );
        }else{
            $args = array(
                'post_type'   => 'post',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
            );
        }

        $blog_query = new \WP_Query( $args );
        $section_class = !empty($settings['_kcg_design_blog_section'] && $settings['_kcg_design_blog_section'] == 'style_one') ? 'works-content w-borderT' : 'about-content';
        $this->__open_wrap();
        ?>
        <div class="<?php echo esc_attr($section_class); ?>">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-11">

                        <div class="caption">
                            <?php if (isset($settings['_kcg_blog_heading']) && !empty($settings['_kcg_blog_heading'])): ?>
                                <span><?php echo $this->parse_text_editor($settings['_kcg_blog_heading']); ?></span>
                            <?php endif; ?>
                            <?php if (isset($settings['_kcg_blog_btn']) && !empty($settings['_kcg_blog_btn'])): ?>
                                <a <?php echo kcg__link($settings['_kcg_blog_btn_link']); ?> class="button b-black b-icon">
                                    <div class="label"><?php echo $this->parse_text_editor($settings['_kcg_blog_btn']); ?></div>
                                    <div class="wrapper">
                                        <div class="arrow svg a-right"></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="journal-list">
                        <?php $i = 0; if ( $blog_query->have_posts() ): 
                            while ( $blog_query->have_posts() ) : $blog_query->the_post();
                            $_link = get_permalink();
                            $target = kcg_get_meta_value( get_the_id(), '_kcg_target' );
                            $bordercolor = kcg_get_meta_value( get_the_id(), '_kcg_bordercolor' );
                            $current_border = !empty($bordercolor) ? $bordercolor : 'orange';
                        ?>
                            <a href="<?php echo esc_url($_link); ?>" target="<?php echo esc_attr($target); ?>" class="item" data-color="<?php echo esc_attr($current_border); ?>">
                                <?php 
                                    if ( has_post_thumbnail() ) : 
                                            the_post_thumbnail('blog_front', []); 
                                    endif; 
                                ?>
                                <div class="j-title"><?php the_title(); ?></div>
                            </a>
                            <?php $i++; endwhile; wp_reset_postdata(); endif;?>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
