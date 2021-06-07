<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Portfolio extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-portfolio';
    }

    public function get_title(){
        return esc_html__( 'Portfolio', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-document-file';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'portfolio', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_portfolio_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_portfolio_section',
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
            '_kcg_portfolio_filter_section',
            [
                'label' => __( 'Filter', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_portfolio_cats',
            array(
                'label' => __('Category', 'droit-elementor-addons-pro'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => get_portfolio_categories(),
                'description' => __('Choose category (or) Leave it empty to apply theme default', 'kcg')
            )
        );
         $this->add_control(
            '_kcg_portfolio_order_by_filter',
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
            '_kcg_portfolio_order_filter',
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
            '_kcg_portfolio_per_page_filter', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 5,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_portfolio_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_portfolio_order_by',
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
            '_kcg_portfolio_order',
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
            '_kcg_portfolio_per_page', [
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
        if(!empty($settings['_kcg_portfolio_cats'])){
            $cats = $settings['_kcg_portfolio_cats'];
        }else{
            $cats = get_terms(array(
                'taxonomy' => 'kcg_categories',
                'hide_empty' => true,
                'orderby'    => !empty($settings['_kcg_portfolio_order_by_filter']) ? $settings['_kcg_portfolio_order_by_filter'] : 'date',
                'order'      => !empty($settings['_kcg_portfolio_order_filter']) ? $settings['_kcg_portfolio_order_filter'] : 'asc',
                'number'     => !empty($settings['_kcg_portfolio_per_page_filter']) ? $settings['_kcg_portfolio_per_page_filter'] : 5,
            ));
        }
        $args = [];
        $order_by = !empty($settings['_kcg_portfolio_order_by']) ? $settings['_kcg_portfolio_order_by'] : 'date';
        $order = !empty($settings['_kcg_portfolio_order']) ? $settings['_kcg_portfolio_order'] : 'asc';
        $per_page = !empty($settings['_kcg_portfolio_per_page']) ? $settings['_kcg_portfolio_per_page'] : 5;
        $portfolio_cats = !empty($settings['_kcg_portfolio_cats']) ? $settings['_kcg_portfolio_cats'] : '';
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        if(!empty($portfolio_cats)){
            $args = array(
                'post_type'   => 'kcg_portfolio',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
                'tax_query' => array(
                    array(
                    'taxonomy' => 'kcg_categories',
                    'field' => 'term_id',
                    'terms' => $portfolio_cats,
                     )
                  )
            );
        }else{
            $args = array(
                'post_type'   => 'kcg_portfolio',
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $per_page,
                'paged' => $paged,
            );
        }

        $portfolio_query = new \WP_Query( $args );
        $this->__open_wrap();
        ?>
        <div class="webdoor w-works" data-scroll-section>
            <div class="submenu">
                <div class="item active" data-scroll data-scroll-speed="1"><span>WORK</span>
                </div>
            </div>
            <div class="inner">
                <div class="col col-1"></div>
                <div class="col col-10">
                    <h1 class="title t-medium t-center" data-scroll data-scroll-speed="1"><strong>Selected projects to show you<br>what we've been done</strong></h1>
                </div>
                <div class="col col-1"></div>
            </div>
        </div>
        <div class="filter" data-scroll-section>
            <div class="inner">
                <div class="col col-12">
                <?php if( !empty($cats) ) : ?>
                    <a href="#" class="item active portfolio-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="0" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('all');?>"><span><?php echo esc_html__('All Projects', 'kcg'); ?></span></a>
                        <?php
                            foreach ( $cats as $index => $cat ) :
                                if(!empty($settings['_kcg_portfolio_cats'])):
                                $term = get_term_by( 'id', $cat, 'kcg_categories', 'ARRAY_A' );
                        ?>
                        <a href="#" class="item portfolio-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $term['name'] ); ?></span></a>
                        <?php else: ?>
                            <a href="#" class="item portfolio-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat->term_id); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $cat->name ); ?></span></a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="works-content" data-scroll-section>
            <div class="inner">
                <div class="col col-12">
                    <div class="works-list">
                    <?php $i = 0; if ( $portfolio_query->have_posts() ): 
                        while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                        $_link = get_permalink();
                        $target = kcg_get_meta_value( get_the_id(), '_kcg_target' );
                        $kcg_portfolio_thumb = kcg_get_meta_value( get_the_id(), '_kcg_portfolio_image' );
                        $kcg_images_gallery = htmlspecialchars_decode( $kcg_portfolio_thumb );
                        $thumb_image = json_decode( $kcg_images_gallery,true );
                        ?>
                        <a href="<?php echo esc_url($_link); ?>" target="<?php echo esc_attr($target); ?>" class="item">
                            <div class="wrapper">
                            <?php if(!empty($kcg_portfolio_thumb)): ?>
                                <figure class="image" style="background-image:url(<?php echo esc_url($thumb_image[0]['full']); ?>);"></figure>
                                <?php endif; ?>
                                <div class="infos">
                                    <div class="name"><?php the_title(); ?></div>
                                    <div class="type"><?php 
                                        $kcg_cats = kcg_get_the_term_list( get_the_ID() , 'kcg_categories','',', ' );
                                        $kcg_cats = !empty( $kcg_cats ) ? strip_tags( $kcg_cats ) : '';
                                        echo $kcg_cats;
                                    ?></div>
                                </div>
                            </div>
                        </a>
                        <?php $i++; endwhile; wp_reset_postdata(); endif;?>
                    </div>
                </div>
            </div>
            <?php
                if ( function_exists( 'kcg_portfolio_loadmore' ) ) {
                    $argument = base64_encode( serialize( $args ) );
                    echo kcg_portfolio_loadmore( $argument, $portfolio_query->max_num_pages, $paged + 1 );
                }
			?>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
