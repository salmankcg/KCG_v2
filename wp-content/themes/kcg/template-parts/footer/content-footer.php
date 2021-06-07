<?php 
	$footer_copyright = kcg_options('kcg_copyright_footer', '<span class="l-desktop">© King\'s Crest Global 2021</span><span class="l-mobile">© KCG 2021</span>');
	$general_email = kcg_options('general_email', 'info@kingscrestglobal.com');
	$general_phone = kcg_options('general_phone', '+1-347-778-2821');
	$general_address = kcg_options('general_address', '174 W 4th Street, Suite 200<br>New York, NY 10014');
	$general_privacy = kcg_options('general_privacy', esc_url(home_url('/')));
  	$general_cookies = kcg_options('general_cookies', esc_url(home_url('/')));
  	$is_show_social = kcg_options('is_show_social', '');
  	$is_show_social_f = kcg_options('is_show_social_f', '');
  	$is_email_f = kcg_options('is_email_f', '');
  	$is_phone_f = kcg_options('is_phone_f', '');
  	$is_address_f = kcg_options('is_address_f', '');
  	$is_footer_heading_show = kcg_options('is_footer_heading_show', '');
  	$footer_heading = kcg_options('footer_heading', 'Want to start a new project?<br><strong>Let\'s get to work!</strong>');
  	$is_footer_btn_show = kcg_options('is_footer_btn_show', '');
  	$footer_btn_text = kcg_options('footer_btn_text', '');
  	$footer_btn_url = kcg_options('footer_btn_url', esc_url(home_url('/')));
  	$footerColor = 'f-black';
  	if(is_page('approach')){
  		$footerColor = 'f-white';
  	}
 ?>
<footer class="footer <?php echo esc_attr($footerColor); ?>">
	<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col col-11">
		<?php if (true == $is_footer_heading_show): ?>
				<h2 class="title t-white"><?php echo $footer_heading; ?></h2>
			<?php endif; ?>
			<?php if (true == $is_footer_btn_show): ?>
				<a href="<?php echo esc_url($footer_btn_url); ?>" class="button b-white">
					<div class="wrapper">
					<span class="text"><?php echo $footer_btn_text; ?></span>
					</div>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col col-4">
		<div class="f-menu">
			<?php 
				$menuParameters = array(
					'container'       => false,
					'echo'            => false,
					'theme_location' => 'footer_menu',
					'walker'         => new kcg_Navwalker(),
					'fallback_cb'     => false,
					'depth'           => 0,
				);

				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
		</div>
		</div>
		<div class="col col-3">
		<div class="f-infos">
			<?php if(true == $is_email_f) : ?>
					<a href="mailto:<?php echo $general_email; ?>" class="external" target="blank"><?php echo $general_email; ?></a>
				<?php endif; ?>
				<?php if(true == $is_phone_f) : ?>
					<a href="tel:<?php echo $general_phone; ?>" target="blank"><?php echo $general_phone; ?></a>
				<?php endif; ?>
				<?php if(true == $is_address_f) : ?>
					<br>
					<span> <?php echo $general_address; ?></span>
			<?php endif; ?>
		</div>
		</div>
		<div class="col col-4">
			<?php 
				if(true == $is_show_social) {
					if(true == $is_show_social_f) {
						echo kcg_social_icons_footer(); 
					}
				}
			?>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col col-11">
		<div class="scrollup">
			<div class="button b-icon b-white">
			<div class="wrapper">
				<div class="background"></div>
				<div class="arrow svg"></div>
			</div>
			</div>
		</div>
		<div class="legals">
			<div><a href="<?php echo esc_url($general_privacy); ?>"><?php echo esc_html__('Privacy', 'kcg'); ?></a> | <a href="<?php echo esc_url($general_cookies); ?>" class=""><?php echo esc_html__('Cookies', 'kcg'); ?></a></div>
			<div><?php echo $footer_copyright; ?></div>
		</div>
		</div>
	</div>
	</div>
</footer>