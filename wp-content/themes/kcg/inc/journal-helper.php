<?php
add_action( 'wp_ajax_kcg_journal_filter', 'kcg_journal_filter' );
add_action( 'wp_ajax_nopriv_kcg_journal_filter', 'kcg_journal_filter' );

function kcg_journal_filter() {
    global $wpdb;
    $nonce = sanitize_text_field( $_POST['nonce'] );
    $cat_in = sanitize_text_field( $_POST['cat_id'] );
    $order_by = sanitize_text_field( $_POST['orderby'] );
    $order = sanitize_text_field( $_POST['order'] );
    $per_page = sanitize_text_field( $_POST['perpage'] );
    $type = sanitize_text_field( $_POST['type'] );
    if ( !wp_verify_nonce( $nonce, 'kcg-nonce' ) ) {
        die( '-1' );
    }
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $args = [];
    if('indivisual' === $type){
        $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $order_by,
            'order'               => $order,
            'posts_per_page'      => $per_page,
            'tax_query' => array(
                array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat_in,
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
        );
    }
    
    $journal_query = new \WP_Query( $args );

     $i = 0; if ( $journal_query->have_posts() ): 
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
        <?php $i++; endwhile; wp_reset_postdata(); endif;
        die;
}
add_action( 'wp_ajax_kcg_journal_loading_post', 'kcg_journal_loading_post' );
add_action( 'wp_ajax_nopriv_kcg_journal_loading_post', 'kcg_journal_loading_post' );

function kcg_journal_loading_post() {
    global $wpdb;
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( !wp_verify_nonce( $nonce, 'kcg-nonce' ) ) {
        die( '-1' );
    }
    $args = unserialize(base64_decode($_POST['args']));
    $args['paged'] = $_POST['page'];
    $args['post_type'] = 'kcg_journal';
    $args['posts_per_page'] = 2;
    $journal_query = new \WP_Query( $args );

     $i = 0; if ( $journal_query->have_posts() ): 
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
        <?php $i++; endwhile; wp_reset_postdata(); endif;
        die;
}

if (!function_exists('kcg_journal_loadmore')) :

    function kcg_journal_loadmore($args, $numpages, $page = 2) {
        $output         = '';
          if ( $numpages >= 2 ) {
            $output .= '<div class="button b-black b-icon b-center b-align-center loading-journal kcg_journal_loadmore" data-nonce="'.wp_create_nonce( 'kcg-nonce' ).'" data-page="' . esc_attr( $page ) . '" data-maxpage="' . esc_attr( $numpages ) . '"  data-args="' . $args . '">';
            $output .= '<span class="label">'.esc_html__('LOAD MORE', 'kcg').'</span>';
            $output .= '<div class="wrapper">';
            $output .= '<div class="arrow svg a-down"></div>';
            $output .= '</div>';
            $output .= '</div>';
            }

            return $output;
        }
    

endif;