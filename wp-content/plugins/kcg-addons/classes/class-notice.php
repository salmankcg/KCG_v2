<?php
namespace KC_GLOBAL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Notice
{
    const __CREST_PHP__ = '5.6';
    const __CREST_EL_VERSION__ = '2.0.0';

    public function __construct(){
        
    }

    public function kcg__missing_php(){
        $message = sprintf(__("Your current PHP version is <strong> " . PHP_VERSION . " </strong>. You need to upgrade your PHP version to <strong> " . self::__CREST_PHP__ . " or later</strong> to run kcg Tab plugin.", 'kcg'));
    ?>
    <style>
        .notice.kcg-php-version-notice {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.kcg-php-version-notice {
            border-right-color: #33ccff !important;
        }
        .notice.kcg-php-version-notice .kcg-php-version-notice-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .notice.kcg-php-version-notice .kcg-php-version-notice-inner .kcg-php-version-notice-icon,
        .notice.kcg-php-version-notice .kcg-php-version-notice-inner .kcg-php-version-notice-content,
        .notice.kcg-php-version-notice .kcg-php-version-notice-inner .kcg-php-version-install-now {
            display: table-row;
            align-items: center;
            justify-content: space-between;        }
        .notice.kcg-php-version-notice .kcg-php-version-notice-icon {
            color: #33ccff;
            font-size: 50px;
            width: 50px;
        }
        .notice.kcg-php-version-notice .kcg-php-version-notice-content {
            padding: 0 0px;
        }
        .notice.kcg-php-version-notice p {
            padding: 0;
            margin: 0;
        }
        .notice.kcg-php-version-notice h3 {
            margin: 0 0 5px;
        }
        .notice.kcg-php-version-notice .kcg-php-version-install-now {
            text-align: center;
        }
        .notice.kcg-php-version-notice .kcg-php-version-install-now .kcg-php-version-install-button {
            padding: 5px 30px;
            height: auto;
            line-height: 20px;
            text-transform: capitalize;
            border-color: #33ccff !important;
            background-image: linear-gradient(-9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -moz-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -webkit-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -ms-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
        }
        .notice.kcg-php-version-notice .kcg-php-version-install-now .kcg-php-version-install-button i {
            padding-right: 5px;
        }
        .rtl .notice.kcg-php-version-notice .kcg-php-version-install-now .kcg-php-version-install-button i {
            padding-right: 0;
            padding-left: 5px;
        }
        .notice.kcg-php-version-notice .kcg-php-version-install-now .kcg-php-version-install-button:active {
            transform: translateY(1px);
        }
        @media (max-width: 767px) {
            .notice.kcg-php-version-notice {
                padding: 10px;
            }
        }
    </style>
        <div class="notice updated kcg-php-version-notice kcg-php-version-install-php-version">
            <div class="kcg-php-version-notice-inner">
                <div class="kcg-php-version-notice-content">
                    <h3><?php esc_html_e( 'Thanks for installing kcg Elementor Addons!', 'kcg' ); ?></h3>
                    <p><?php echo $message ; ?></p>
                </div>
            </div>
        </div>
    <?php
    }

    
    private function is_plugin_installed_or_not($basename) {
        if (!function_exists('get_plugins')) {
            include_once ABSPATH . '/wp-admin/includes/plugin.php';
        }

        $is_installed_plugins = get_plugins();

        return isset($is_installed_plugins[$basename]);
    }
    public function is_missing_elementor_plugin(){
        $screen = get_current_screen();
        if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
            return;
        }

        $plugin = 'elementor/elementor.php';

        $installed_plugins = get_plugins();

        $is_elementor_installed = isset( $installed_plugins[ $plugin ] );

        if ( $is_elementor_installed ) {

            if ( ! current_user_can( 'activate_plugins' ) ) {
                return;
            }

            $button_text = __( 'Activate Elementor', 'kcg' );
            $button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
        } else {
            if ( ! current_user_can( 'install_plugins' ) ) {
                return;
            }

            $button_text = __( 'Install Elementor', 'kcg' );
            $button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        }
    ?>
    <style>
        .notice.kcg-elementor-notice {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.kcg-elementor-notice {
            border-right-color: #33ccff !important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-icon,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-content,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-install-now {
            display: table-row;
            align-items: center;
            justify-content: space-between;        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-icon {
            color: #33ccff;
            font-size: 50px;
            width: 50px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-content {
            padding: 0 0px;
        }
        .notice.kcg-elementor-notice p {
            padding: 0;
            margin: 0;
        }
        .notice.kcg-elementor-notice h3 {
            margin: 0 0 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now {
            text-align: center;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button {
            padding: 5px 30px;
            height: auto;
            line-height: 20px;
            text-transform: capitalize;
            border-color: #33ccff !important;
            background-image: linear-gradient(-9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -moz-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -webkit-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -ms-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 5px;
        }
        .rtl .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 0;
            padding-left: 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button:active {
            transform: translateY(1px);
        }
        @media (max-width: 767px) {
            .notice.kcg-elementor-notice {
                padding: 10px;
            }
        }
    </style>
    <div class="notice updated kcg-elementor-notice kcg-elementor-install-elementor">
        <div class="kcg-elementor-notice-inner">
            <div class="kcg-elementor-notice-content">
                <h3><?php esc_html_e( 'Thanks for installing KCG Addons!', 'kcg' ); ?></h3>
                <p><?php esc_html_e( 'This is elementor compatible plugin so need to install/active elementor by hitting activate elementor button. Just use and enjoy', 'kcg' ); ?></p>
            </div>

            <div class="kcg-elementor-install-now">
                <a class="button button-primary kcg-elementor-install-button" href="<?php echo esc_attr( $button_link ); ?>"><i class="dashicons dashicons-download"></i><?php echo esc_html( $button_text ); ?></a>
            </div>
        </div>
    </div>
    <?php
    }
    public function thanks_message_notice() {
        if ( 'true' === get_user_meta( get_current_user_id(), '_kcg__thanks_notice', true ) ) {
            return;
        }
    ?>
    <style>
        .notice.kcg-thanks-for-install {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.kcg-thanks-for-install {
            border-right-color: #33ccff !important;
        }
        .notice.kcg-thanks-for-install h3 {
            margin: 0 0 5px;
        }
        .notice.kcg-thanks-for-install p {
            padding: 0;
            margin: 0;
        }
    </style>
    <script>jQuery( function( $ ) {
            $( 'div.notice.kcg-thanks-for-install' ).on( 'click', 'button.notice-dismiss', function( event ) {
                event.preventDefault();

                $.post( ajaxurl, {
                    action: 'kcg__set_thanks_message'
                } );
            } );
        } );</script>
        <div class="notice is-dismissible kcg-thanks-notice kcg-thanks-for-install">
            <div class="kcg-thanks-notice-inner">
                <div class="kcg-thanks-notice-content">
                    <h3><?php esc_html_e( 'Thanks for using KCG Elementor Addons!', 'kcg' ); ?></h3>
                    <p><?php esc_html_e( 'By using this plugin you can change your website look. Just use and enjoy.', 'kcg' ); ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    public function ajax_kcg__set_thanks_message() {
        update_user_meta( get_current_user_id(), '_kcg__thanks_notice', 'true' );
        die;
    }

    public function is_minimum_el_version(){
        if ( ! current_user_can( 'update_plugins' ) ) {
            return;
        }
        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
        $_button_text = __('Update Elementor', 'kcg');
       
        $message = sprintf(
            esc_html__('"%1$s" requires minimum "%2$s" version %3$s or greater.', 'kcg'),
            '<strong>' . esc_html__('kcg Tab', 'kcg') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'kcg') . '</strong>',
            self::__CREST_EL_VERSION__,
        );
    ?>
    <style>
        .notice.kcg-elementor-notice {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.kcg-elementor-notice {
            border-right-color: #33ccff !important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-icon,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-content,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-install-now {
            display: table-row;
            align-items: center;
            justify-content: space-between;        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-icon {
            color: #33ccff;
            font-size: 50px;
            width: 50px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-content {
            padding: 0 0px;
        }
        .notice.kcg-elementor-notice p {
            padding: 0;
            margin: 0;
        }
        .notice.kcg-elementor-notice h3 {
            margin: 0 0 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now {
            text-align: center;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button {
            padding: 5px 30px;
            height: auto;
            line-height: 20px;
            text-transform: capitalize;
            border-color: #33ccff !important;
            background-image: linear-gradient(-9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -moz-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -webkit-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -ms-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 5px;
        }
        .rtl .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 0;
            padding-left: 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button:active {
            transform: translateY(1px);
        }
        @media (max-width: 767px) {
            .notice.kcg-elementor-notice {
                padding: 10px;
            }
        }
    </style>
        <div class="notice updated kcg-elementor-notice kcg-elementor-install-elementor">
            <div class="kcg-elementor-notice-inner">
                <div class="kcg-elementor-notice-content">
                    <h3><?php esc_html_e( 'Thanks for installing kcg Elementor Addons!', 'kcg' ); ?></h3>
                    <p><?php echo $message ; ?></p>
                </div>

                <div class="kcg-elementor-install-now">
                    <a class="button button-primary kcg-elementor-install-button" href="<?php echo esc_attr( $upgrade_link ); ?>"><i class="dashicons dashicons-download"></i><?php echo $_button_text; ?></a>
                </div>
            </div>
        </div>
    <?php
    }

    public function is_recommendation_el_version(){
        if ( ! current_user_can( 'update_plugins' ) ) {
            return;
        }
        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
        $_button_text = __('Update Elementor', 'kcg');
    ?>
    <style>
        .notice.kcg-elementor-notice {
            border-left-color: #33ccff !important;
            padding: 20px;
        }
        .rtl .notice.kcg-elementor-notice {
            border-right-color: #33ccff !important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-icon,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-notice-content,
        .notice.kcg-elementor-notice .kcg-elementor-notice-inner .kcg-elementor-install-now {
            display: table-row;
            align-items: center;
            justify-content: space-between;        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-icon {
            color: #33ccff;
            font-size: 50px;
            width: 50px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-notice-content {
            padding: 0 0px;
        }
        .notice.kcg-elementor-notice p {
            padding: 0;
            margin: 0;
        }
        .notice.kcg-elementor-notice h3 {
            margin: 0 0 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now {
            text-align: center;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button {
            padding: 5px 30px;
            height: auto;
            line-height: 20px;
            text-transform: capitalize;
            border-color: #33ccff !important;
            background-image: linear-gradient(-9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -moz-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -webkit-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
            background-image: -ms-linear-gradient( -9.412deg, rgb(0,177,255) 0%, rgb(255,0,237) 100%)!important;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 5px;
        }
        .rtl .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button i {
            padding-right: 0;
            padding-left: 5px;
        }
        .notice.kcg-elementor-notice .kcg-elementor-install-now .kcg-elementor-install-button:active {
            transform: translateY(1px);
        }
        @media (max-width: 767px) {
            .notice.kcg-elementor-notice {
                padding: 10px;
            }
        }
    </style>
    <div class="notice updated kcg-elementor-notice kcg-elementor-install-elementor">
        <div class="kcg-elementor-notice-inner">
            <div class="kcg-elementor-notice-content">
                <h3><?php esc_html_e( 'Thanks for installing kcg Elementor Addons!', 'kcg' ); ?></h3>
                <p><?php esc_html_e( 'A new version of Elementor is available. For better performance and compatibility of kcg Elementor Tab, we recommend updating to the latest version.', 'kcg' ); ?></p>
            </div>

            <div class="kcg-elementor-install-now">
                <a class="button button-primary kcg-elementor-install-button" href="<?php echo esc_attr( $upgrade_link ); ?>"><i class="dashicons dashicons-download"></i><?php echo $_button_text; ?></a>
            </div>
        </div>
    </div>
    <?php
    }
}