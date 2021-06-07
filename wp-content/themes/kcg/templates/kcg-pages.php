<?php
/**
 * Template Name: KCG Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kcg
 */
get_header();
?>
<section class="pages" id="pages">
<?php
while ( have_posts() ) :
	the_post();
	 get_template_part( 'template-parts/content', 'page' );

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile;
?>
</section>

  <?php
  get_template_part( 'template-parts/content', 'footer' );
get_footer(); ?>

