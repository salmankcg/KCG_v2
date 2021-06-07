<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Journal extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-journal';
    }

    public function get_title(){
        return esc_html__( 'Journal', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-document-file';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'Journal', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_journal_preset_section',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_journal_section',
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
            '_kcg_journal_filter_section',
            [
                'label' => __( 'Filter', 'kcg' ),
            ]
        );
        $this->add_control(
			'_kcg_journal_filter_enable',
			[
				'label'        => __( 'Enable Filter', 'kcg' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'return_value' => 'yes',
			]
		);
        $this->add_control(
            '_kcg_journal_cats',
            array(
                'label' => __('Category', 'kcg'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => get_blog_categories(),
                'description' => __('Choose category (or) Leave it empty to apply theme default', 'kcg'),
                'condition' => [
                    '_kcg_journal_filter_enable' => ['yes']
                ]
            )
        );
         $this->add_control(
            '_kcg_journal_order_by_filter',
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
                'condition' => [
                    '_kcg_journal_filter_enable' => ['yes']
                ]
            ]
        );
         $this->add_control(
            '_kcg_journal_order_filter',
            [
                'label' => __('Order', 'kcg'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ase',
                'options' => [
                    'ase' => __('Ascending Order', 'kcg'),
                    'desc' => __('Descending Order', 'kcg'),
                ],
                'condition' => [
                    '_kcg_journal_filter_enable' => ['yes']
                ]
            ]
        );
         $this->add_control(
            '_kcg_journal_per_page_filter', [
                'label' => esc_html__('Posts Per Page', 'kcg'),
                'type' => Controls_Manager::NUMBER,
                'placeholder' => esc_html__('Enter Number', 'kcg'),
                'default' => 5,
                'condition' => [
                    '_kcg_journal_filter_enable' => ['yes']
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            '_kcg_journal_query_section',
            [
                'label' => __( 'Query', 'kcg' ),
            ]
        );
         $this->add_control(
            '_kcg_journal_order_by',
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
            '_kcg_journal_order',
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
            '_kcg_journal_per_page', [
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
        if(!empty($settings['_kcg_journal_cats'])){
            $cats = $settings['_kcg_journal_cats'];
        }else{
            $cats = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => true,
                'orderby'    => !empty($settings['_kcg_journal_order_by_filter']) ? $settings['_kcg_journal_order_by_filter'] : 'date',
                'order'      => !empty($settings['_kcg_journal_order_filter']) ? $settings['_kcg_journal_order_filter'] : 'asc',
                'number'     => !empty($settings['_kcg_journal_per_page_filter']) ? $settings['_kcg_journal_per_page_filter'] : 5,
            ));
        }
        $args = [];
        $order_by = !empty($settings['_kcg_journal_order_by']) ? $settings['_kcg_journal_order_by'] : 'date';
        $order = !empty($settings['_kcg_journal_order']) ? $settings['_kcg_journal_order'] : 'asc';
        $per_page = !empty($settings['_kcg_journal_per_page']) ? $settings['_kcg_journal_per_page'] : 5;
        $journal_cats = !empty($settings['_kcg_journal_cats']) ? $settings['_kcg_journal_cats'] : '';
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        if(!empty($journal_cats)){
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
                    'terms' => $journal_cats,
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

        $journal_query = new \WP_Query( $args );
        $this->__open_wrap();
        ?>
    
        
        <?php if( isset($settings['_kcg_journal_filter_enable']) && 'yes' == !empty($settings['_kcg_journal_filter_enable']) ) : ?>
            <div class="filter f-marginT">
                <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-11">
                    <?php if( !empty($cats) ) : ?>
                        <a href="#" class="item active journal-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="0" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('all');?>"><span><?php echo esc_html__('All Categorie', 'kcg'); ?></span></a>
                        <?php
                            foreach ( $cats as $index => $cat ) :
                                if(!empty($settings['_kcg_journal_cats'])):
                                $term = get_cat_name($cat);
                        ?>
                    
                            <a href="#" class="item journal-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $term ); ?></span></a>
                        <?php else: ?>
                            <a href="#" class="item journal-filter" data-nonce="<?php echo wp_create_nonce( 'kcg-nonce' ); ?>" data-id="<?php echo esc_attr($cat->term_id); ?>" data-order="<?php echo esc_attr($order); ?>" data-orderby="<?php echo esc_attr($order_by); ?>" data-perpage="<?php echo esc_attr($per_page); ?>" data-type="<?php echo esc_html('indivisual');?>"><span><?php echo esc_html( $cat->name ); ?></span></a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="journal-content">
            <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col col-11">
                <div class="journal-list">
                
                    <?php $i = 0; if ( $journal_query->have_posts() ): 
                        while ( $journal_query->have_posts() ) : $journal_query->the_post();
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
            
            <?php
                if ( function_exists( 'kcg_journal_loadmore' ) ) {
                    $argument = base64_encode( serialize( $args ) );
                    echo kcg_journal_loadmore( $argument, $journal_query->max_num_pages, $paged + 1 );
                }
            ?>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
