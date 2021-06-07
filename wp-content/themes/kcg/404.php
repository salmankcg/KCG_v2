<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kcg
 */

get_header();

$blog_sidebar = kcg_options('kcg_blog_setting');

?>

	<main id="primary" class="site-main">
	     <?php
			get_template_part('template-parts/banner/banner', '404');

			kcg_wrapper_start( $blog_sidebar );		
	 	?>
		
		
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kcg' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kcg' ); ?></p>

					<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
         <?php kcg_wrapper_end($blog_sidebar); ?>
	</main><!-- #main -->

<?php
get_footer();
