<?php
if ( ! function_exists( 'kcg_posted_on' ) ) :
	function kcg_posted_on() {
	?>
	  <span class="post_date_loop"><?php echo esc_html( get_the_date('M d, Y') ); ?> </span> 
	<?php
	}
endif;

if ( ! function_exists( 'kcg_posted_by' ) ) :
	function kcg_posted_by() {
		global $post;
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'kcg' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $post->post_author) ) . '">' . esc_html(get_the_author_meta( 'display_name',$post->post_author) ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'kcg_entry_footer' ) ) :
	function kcg_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kcg' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kcg' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'kcg' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kcg' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kcg' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kcg' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'kcg_entry_meta_footer' ) ) :

	function kcg_entry_meta_footer() {

		$readmore_butotn_text = kcg_options('kcg_read_more_text_button', 'Read More');

	?>
	<div class="post_bottom">
		<a href="<?php echo esc_url( get_the_permalink()); ?>" class="learn_btn_two"><?php echo esc_html($readmore_butotn_text); ?></a>
		<span class="post_comments">
		  <?php comments_number( 'No comments', '1 comment', '% comments' ); ?>
		</span>
    </div>
   <?php 
	}
endif;	

if ( ! function_exists( 'kcg_post_thumbnail' ) ) :

	function kcg_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'zoom_in_img'
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :

	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

function kcg_is_comment_by_post_author( $comment = null ) {

	if ( is_object( $comment ) && $comment->user_id > 0 ) {

		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );

		if ( ! empty( $user ) && ! empty( $post ) ) {

			return $comment->user_id === $post->post_author;

		}
	}
	return false;

}

/**
 * Site logo 
 */

 if(!function_exists('kcg_logo')) {
	function kcg_logo () {
       
		$logo_option_url = KCG_IMAGES.'/logo.png';
		$sticky_logo_option = KCG_IMAGES.'/logo.png';
		$sticky_ratina_sticky_url = '';
		$sticky_ratina_attr = '';
		$ratena_url = '';
		$ratena_attr = '';
		$logo_alt = 'rhr logo';
		$logo_alt_sticky = 'kcg default sticky logo';

		if(class_exists( 'Redux' ) ) {

			$logo = kcg_options('kcg_logo'); 
			$logo_sticky = kcg_options('kcg_sticky_logo'); 
			$logo_ratina = kcg_options('kcg_retina_logo');
			$logo_ratina_sticky = kcg_options('kcg_retina_sticky_logo');
            
			// ratina logo 
			if(isset($logo_ratina['url'] ) && $logo_ratina['url'] !='') {
              $ratena_url = $logo_ratina['url'];
			}

			// ratina logo sticky
			if(isset($logo_ratina_sticky['url'] ) && $logo_ratina_sticky['url'] !='') {
              $sticky_ratina_sticky_url = $logo_ratina_sticky['url'];
			}
            
			// site logo 
             if(isset($logo['url']) && $logo['url'] != '') {
				$logo_option_url = $logo['url'];
			 }

             if(isset($logo['id']) && $logo['id'] != '') {
				$logo_alt = get_post_meta( $logo['id'], '_wp_attachment_image_alt', true);
			 }

			// sitcky log 

			 if(isset($logo_sticky['url']) && $logo_sticky['url'] != '') {
				$sticky_logo_option = $logo_sticky['url'];
			 }

			 if(isset($logo_sticky['id']) && $logo_sticky['id'] != '') {
				$logo_alt_sticky = get_post_meta( $logo_sticky['id'], '_wp_attachment_image_alt', true);
			 }
		}

		//  logo ratina
		if($ratena_url  != ''){
			$ratena_attr = 'srcset="'.$logo_option_url.", ".$ratena_url." 2x".'"';
		}

		// sticky logo ratina 

		if($sticky_ratina_sticky_url  != ''){
			$sticky_ratina_attr = 'srcset="'.$default_sticky_logo.", ".$sticky_ratina_sticky_url." 2x".'"';
		}

		if(function_exists('the_custom_logo') && has_custom_logo()) {

			the_custom_logo();

		}elseif($logo_option_url != '') {

          echo '<img src="'.esc_url($logo_option_url).'" alt="'.esc_attr( $logo_alt ).'">';

		}else{

			echo '<a href="'.esc_url(home_url('/')).'" class="navbar-brand logo">
			        <img src="'.esc_url($logo_option_url).'" alt="'.esc_attr( $logo_alt ).'">
			      </a>';	
		}
	}
 }
 function kcg_favicon(){
	if(class_exists( 'Redux' ) ) {

	   $fav = kcg_options('kcg_fav_icon');
			   
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
		   if ( isset( $fav['url'] ) && ! empty( $fav['url'] ) ) {
			   echo '<link rel="shortcut icon" href="'.esc_url($fav['url']).'">';
		   }
	   }
   }
}
 /**
  * display tag 
  */
 if(!function_exists('kcg_single_page_tag'))  {
	 function kcg_single_page_tag() {
		 if(has_tag() ) :
		 ?>
		 <div class="tagcloud">
            <?php the_tags(null, ''); ?>
        </div>
		 <?php
		 endif;
	 }
 }


if(!function_exists('kcg_about_author')) {
	
	function kcg_about_author() {
		global $post;
      ?>
	  <div class="about-autheor">
		<h3 class="comment-reply-title"><?php echo esc_html__( 'About the Author', 'kcg' ); ?></h3>
		<div class="author-details">
		  <div class="auther-avater">
		  <a href="<?php echo esc_url(get_author_posts_url( $post->post_author)); ?>">
		    <?php echo get_avatar( get_the_author_meta( 'user_email',$post->post_author)); ?>
		   </a>
		  </div>
		  <div class="auther-info">
		    <h4><?php echo esc_html(  get_the_author_meta( 'display_name',$post->post_author) ); ?></h4>
			<p><?php echo esc_html(  get_the_author_meta( 'description',$post->post_author) ); ?></p>
		  </div>
		</div>
	  </div>
	  <?php 
	}
}
if( !function_exists( 'kcg_widgets_init' ) ){
	function kcg_widgets_init() {
	    register_sidebar(
	        array(
	            'id' => 'footer-first-column',
	            'name' => esc_html__('Footer First Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout first column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-second-column',
	            'name' => esc_html__('Footer Second Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout second column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-third-column',
	            'name' => esc_html__('Footer Third Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout three column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-four-column',
	            'name' => esc_html__('Footer Four Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout four column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-five-column',
	            'name' => esc_html__('Footer Five Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout five column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-six-column',
	            'name' => esc_html__('Footer Six Column', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout six column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<h3 class="f_title">',
	            'after_title' => '</h3>'
	        )
	    );
	    register_sidebar(
	        array(
	            'id' => 'footer-firs-column-m',
	            'name' => esc_html__('Footer First Column For Mobile', 'kcg' ),
	            'description' => esc_html__('Add Widgets to display in footer layout first column.', 'kcg' ),
	            'before_widget' => '<div id="%1$s" class="card f_widget f_about_widget_mobile clearfix">',
	            'after_widget' => '</div>',
	            'before_title' => '<div class="card-header" id="headingOne"><button class="btn collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
              aria-controls="collapseOne">',
	            'after_title' => '</button></div>'
	        )
	    );
	}
}
add_action( 'widgets_init', 'kcg_widgets_init' );

if( !function_exists( 'kcg_sidebar' ) ){
	function kcg_sidebar( $sidebar_name , $default ){
		echo '<div class="f_widget about_list_widget">';
			if ( is_active_sidebar( $sidebar_name ) ){
				dynamic_sidebar( $sidebar_name );
			}
			elseif( $sidebar_name == 0 ){

				if ( is_active_sidebar( $default ) ){
					dynamic_sidebar( $default );
				}
				else{
					echo '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'kcg' ).'</p>';
				}
			}
		echo '</div>';

	}
}
if( !function_exists( 'kcg_sidebar_mobile' ) ){
	function kcg_sidebar_mobile( $sidebar_name , $default ){
		//echo '<div class="card f_widget f_about_widget_mobile">';
			if ( is_active_sidebar( $sidebar_name ) ){
				dynamic_sidebar( $sidebar_name );
			}
			elseif( $sidebar_name == 0 ){

				if ( is_active_sidebar( $default ) ){
					dynamic_sidebar( $default );
				}
				else{
					echo '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'kcg' ).'</p>';
				}
			}
		//echo '</div>';

	}
}
add_filter( 'document_title_separator', 'whitedot_title_separator' );
function whitedot_title_separator( $sep ) {

	$sep = "|";

	return $sep;

}