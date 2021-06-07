<?php
add_action( 'wp_ajax_kcg_portfolio_filter', 'kcg_portfolio_filter' );
add_action( 'wp_ajax_nopriv_kcg_portfolio_filter', 'kcg_portfolio_filter' );

function kcg_portfolio_filter() {
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
            'post_type'   => 'kcg_portfolio',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $order_by,
            'order'               => $order,
            'posts_per_page'      => $per_page,
            'tax_query' => array(
                array(
                'taxonomy' => 'kcg_categories',
                'field' => 'term_id',
                'terms' => $cat_in,
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
        );
    }
    
    $portfolio_query = new \WP_Query( $args );

     $i = 0; if ( $portfolio_query->have_posts() ): 
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
                <img class="image" src="<?php echo esc_url($thumb_image[0]['full']); ?>" alt="<?php echo get_post_meta($thumb_image[0]['itemId'], '_wp_attachment_image_alt', true); ?>">
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
        <?php $i++; endwhile; wp_reset_postdata(); endif;
        die;
}
add_action( 'wp_ajax_kcg_loading_post', 'kcg_loading_post' );
add_action( 'wp_ajax_nopriv_kcg_loading_post', 'kcg_loading_post' );

function kcg_loading_post() {
    global $wpdb;
    $nonce = sanitize_text_field( $_POST['nonce'] );
    if ( !wp_verify_nonce( $nonce, 'kcg-nonce' ) ) {
        die( '-1' );
    }
    $args = unserialize(base64_decode($_POST['args']));
    $args['paged'] = $_POST['page'];
    $args['post_type'] = 'kcg_portfolio';
    $args['posts_per_page'] = 2;
    $portfolio_query = new \WP_Query( $args );

     $i = 0; if ( $portfolio_query->have_posts() ): 
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
                <img class="image" src="<?php echo esc_url($thumb_image[0]['full']); ?>" alt="<?php echo get_post_meta($thumb_image[0]['itemId'], '_wp_attachment_image_alt', true); ?>">
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
        <?php $i++; endwhile; wp_reset_postdata(); endif;
        die;
}

if (!function_exists('kcg_portfolio_loadmore')) :

    function kcg_portfolio_loadmore($args, $numpages, $page = 2) {
        $output         = '';
          if ( $numpages >= 2 ) {
            $output .= '<div class="button b-black b-icon b-center b-align-center loading-portfolio kcg_portfolio_loadmore" data-nonce="'.wp_create_nonce( 'kcg-nonce' ).'" data-page="' . esc_attr( $page ) . '" data-maxpage="' . esc_attr( $numpages ) . '"  data-args="' . $args . '">';
            $output .= '<span class="label">'.esc_html__('LOAD MORE', 'kcg').'</span>';
            $output .= '<div class="wrapper">';
            $output .= '<div class="arrow svg a-down"></div>';
            $output .= '</div>';
            $output .= '</div>';
            }

            return $output;
        }
    

endif;