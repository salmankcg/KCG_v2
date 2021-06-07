<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kcg
 */

get_header();


$blog_sidebar = kcg_options('kcg_blog_setting');


?>

	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/blog/content/content', 'single');

		endwhile; // End of the loop.
		wp_reset_postdata(  );
		
		?>
	</main><!-- #main -->

<?php

get_footer();
