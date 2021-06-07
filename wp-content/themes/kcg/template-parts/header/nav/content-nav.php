<?php 
  $header_copyright = kcg_options('kcg_copyright_header', '© King\'s Crest Global 2021');
  $general_email = kcg_options('general_email', 'info@kingscrestglobal.com');
  $general_phone = kcg_options('general_phone', '+1-347-778-2821');
  $general_address = kcg_options('general_address', '174 W 4th Street, Suite 200<br>New York, NY 10014');
  $general_privacy = kcg_options('general_privacy', esc_url(home_url('/')));
  $general_cookies = kcg_options('general_cookies', esc_url(home_url('/')));
  $is_show_social = kcg_options('is_show_social', '');
  $is_show_social_h = kcg_options('is_show_social_h', '');
  $is_email_h = kcg_options('is_email_h', '');
  $is_phone_h = kcg_options('is_phone_h', '');
  $is_address_h = kcg_options('is_address_h', '');
 ?>
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col col-11">
        <div class="content">
          <a href="/" class="logo svg"></a>
          <div class="hmbrg">
            <span class="text">CLOSE</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="menu">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col col-3">
        <?php 
            wp_nav_menu( array(
                'menu_class' => '',
                'container'  => '',
                'link_before'  => '<span>',
                'link_after'  => '</span>',
                'theme_location' => 'primary_left',
                'walker'         => new kcg_Navwalker(),
                'fallback_cb'     => false,
            ) ); 
        ?>
        </div>
        <div class="col col-3">
          <?php 
              wp_nav_menu( array(
                  'menu_class' => '',
                  'container'  => '',
                  'link_before'  => '<span>',
                  'link_after'  => '</span>',
                  'theme_location' => 'primary_right',
                  'walker'         => new kcg_Navwalker(),
                  'fallback_cb'     => false,
              ) ); 
          ?>
        </div>
        <div class="col col-4">
        <?php 
          if(true == $is_show_social) {
            if(true == $is_show_social_h) {
              echo kcg_social_icons_header(); 
            }
          }
        ?>
          <div class="infos">
          <?php if( true == $is_email_h ) : ?>
            <a href="mailto:<?php echo $general_email; ?>" class="external" target="blank"><?php echo $general_email; ?></a>
          <?php endif; ?>
          <?php if( true == $is_phone_h ) : ?>
            <a href="tel:<?php echo $general_phone; ?>" target="blank"><?php echo $general_phone; ?></a>
          <?php endif; ?>
          <?php if( true == $is_address_h ) : ?>
            <br>
            <span>
              <?php echo $general_address; ?>
            </span>
        <?php endif; ?>
          </div>  
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col col-10">
          <div class="legals">
            <div><a href="<?php echo esc_url($general_privacy); ?>"><?php echo esc_html__('Privacy', 'kcg'); ?></a> | <a href="<?php echo esc_url($general_cookies); ?>" class=""><?php echo esc_html__('Cookies', 'kcg'); ?></a></div>
            <div><span><?php echo $header_copyright; ?></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>