<?php
namespace KC_GLOBAL\Widget;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;
use \Elementor\CREST_BASE;

if (!defined('ABSPATH')) exit;

class Contact extends CREST_BASE{
    
    public function get_name(){
        return 'kcg-contact';
    }

    public function get_title(){
        return esc_html__( 'Contact', 'kcg' );
    }

    public function get_icon(){
        return 'kcg-signature eicon-form-horizontal';
    }

    public function get_categories(){
        return ['kcg_cat'];
    }
    public function get_keywords() {
        return [ 'Contact', 'contact', 'kcg'];
    }
    public function get_help_url() {
        return '';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            '_kcg_contact_preset',
            [
                'label' => __( 'Preset', 'kcg' ),
            ]
        );

        $this->add_control(
            '_kcg_design_contact_section',
            [
                'label' => esc_html__( 'Design Format', 'kcg' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options'   => [
                    'default' => 'Select',
                ],
                'default' => 'default',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_kcg_contact_content',
            [
                'label' => __( 'Content', 'kcg' ),
            ]
        );
        $this->add_control(
            '_kcg_contact_title',
            [
                'label' => 'Title',
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __( '<strong>We’d love to<br>hear from you! </strong>', 'kcg' ),
                'dynamic' => [
                    'active'   => true,
                ],
                'placeholder' => __( 'Enter title', 'kcg' ),
                'description' => __( 'Enter title (or) Leave it empty to hide.', 'kcg' ),
            ]
        );

        if ( ! kcg_contact7_activated() ) {
            $this->register_cf7_notice();
        }else{
            $this->register_cf7_form_selector();
        }
        $this->end_controls_section();
    }
    //Notice
    protected function is_cf7_installed_or_not($basename) {
        if (!function_exists('get_plugins')) {
            include_once ABSPATH . '/wp-admin/includes/plugin.php';
        }

        $installed_plugins = get_plugins();

        return isset($installed_plugins[$basename]);
    }
    protected function register_cf7_notice(){
        $cf7_form = 'contact-form-7/wp-contact-form-7.php';
        $kcg = 'KCG Themes';

        if ($this->is_cf7_installed_or_not($cf7_form)) {

            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $cf7_form . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $cf7_form);

            $message = __('To activate and run <strong>'.$kcg.'</strong> please activate Contact Form 7. You can activate Contact Form 7 from here', 'jcg');
            
            $_button_text = __('Activate Contact Form 7', 'jcg');
        } else {
            $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=contact-form-7'), 'install-plugin_contact-form-7');

            $message = sprintf(__('To activate and run <strong>'.$kcg.'</strong> please install and activate Contact Form 7. You can install and activate Contact Form 7 from here', 'jcg'), '<strong>', '</strong>');
            $_button_text = __('Install Contact Form 7', 'jcg');
        }

        $_button = '<p><a href="' . $activation_url . '" class="button-primary" target="_blank">' . $_button_text . '</a></p>';
        
        $this->add_control(
            '_cf7_missing_notice',
            [
                'type' => Controls_Manager::RAW_HTML,
                 'raw' => sprintf(__( '%1$s, %2$s', 'jcg' ), $message, $_button
                ),
                 'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
            ]
        );
        return;
    }
    protected function register_cf7_form_selector(){
     $this->add_control(
        '_kcg_cf7_form_id',
        [
            'label' => __( 'Select Your Form', 'jcg' ),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => kcg_cf7_list(),
            'default' => ''
        ]
    ); 
}
    protected function render() {
        $settings = $this->get_settings_for_display();
        $id_int = substr( $this->get_id_int(), 0, 3 );
        $is_show_social = kcg_options('is_show_social', '');
        $is_show_social_h = kcg_options('is_show_social_h', '');
        $general_email = kcg_options('general_email', 'info@kingscrestglobal.com');
        $general_phone = kcg_options('general_phone', '+1-347-778-2821');
        $general_address = kcg_options('general_address', '174 W 4th Street, Suite 200<br>New York, NY 10014');
        $is_email_h = kcg_options('is_email_h', '');
        $is_phone_h = kcg_options('is_phone_h', '');
        $is_address_h = kcg_options('is_address_h', '');
        $this->__open_wrap();
        ?>
         <div class="webdoor w-contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col col-9">
                        <div class="contact">
                            <div class="right">
                            <?php if(isset($settings['_kcg_contact_title']) && !empty($settings['_kcg_contact_title'])) : ?>
                                <h1 class="title t-white"><?php echo $this->parse_text_editor($settings['_kcg_contact_title']); ?></h1>
                            <?php endif; ?>
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
                            <div class="left">
                            <?php 
                              if(true == $is_show_social) {
                                if(true == $is_show_social_h) {
                                  echo kcg_social_icons_header(); 
                                }
                              }
                            ?>
                            <?php echo do_shortcode('[contact-form-7 id="'.$settings['_kcg_cf7_form_id'].'"]' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->__close_wrap();
    }
    
}
