<?php
/**
 * Template Name: KCG Default
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kcg
 */
get_header();?>

<div class="main-content pages" id="pages">  
	<section>
	<?php if( is_page( 'Home' ) ) : ?>
		<div class="scrolldown s-white">
			<span><?php echo esc_html__('SCROLL','kcg'); ?></span>
		</div>
		
		<div class="home-bullets">
			<div data-target="slide-1" class="button b-bullet active">
				<div class="wrapper"></div>
			</div>
			<div data-target="slide-2" class="button b-bullet">
				<div class="wrapper"></div>
			</div>
			<div data-target="slide-3" class="button b-bullet">
				<div class="wrapper"> </div>
			</div>
			<div data-target="slide-4" class="button b-bullet">
				<div class="wrapper"></div>
			</div>
			<div data-target="slide-5" class="button b-bullet">
				<div class="wrapper"></div>
			</div>
		</div>
		<?php endif; ?>
		<?php if( is_page( 'services' ) ) : ?>
			<div class="scrolldown">
				<span><?php echo esc_html__('SCROLL','kcg'); ?></span>
			</div>

			<div class="services-bullets sb-dark">
				<div data-target="slide-1" class="button b-bullet active">
					<div class="wrapper"></div>
				</div>
				<div data-target="slide-2" class="button b-bullet">
					<div class="wrapper"></div>
				</div>
				<div data-target="slide-3" class="button b-bullet">
					<div class="wrapper"> </div>
				</div>
				<div data-target="slide-4" class="button b-bullet">
					<div class="wrapper"></div>
				</div>
			</div>
		<?php endif; ?>
		<?php if( is_page( 'services-strategy' ) || is_page( 'services-marketing' ) || is_page( 'services-product' ) ) : ?>
			<div class="scrolldown s-white">
				<span><?php echo esc_html__('SCROLL','kcg'); ?></span>
			</div>
		<?php endif; ?>
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
</div>
<?php
get_footer(); ?>
