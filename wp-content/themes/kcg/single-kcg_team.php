<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kcg
 */

get_header();


?>
<div class="main-content pages" id="pages">  
	<section>    
	  <div class="webdoor w-person">
		<div class="container-fluid">
		  <div class="row justify-content-center">
			<div class="col col-1">
			  <a href="#" onclick="window.history.back();" class="button b-black b-icon">
				<div class="wrapper">
				  <div class="arrow svg a-left"></div>
				</div>
			  </a>
			</div>
			<?php 
				$role = get_post_meta( get_the_ID(), '_kcg_designation_role', true );
			?>
			<div class="col col-4">
			  <h1 class="title"><strong><?php echo esc_html(the_title()); ?></strong></h1>
			  <div class="subtitle"><?php echo esc_html($role); ?></div>
			  <div class="paragraph">
			  <?php the_content();?>
			  </div>
			</div>
			<div class="col col-5">
			  <div class="people p-full">
			  	<?php if(has_post_thumbnail( )) { 
				  		the_post_thumbnail(); 
			 		}
			 	?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</section>
</div>
<?php

get_footer();
