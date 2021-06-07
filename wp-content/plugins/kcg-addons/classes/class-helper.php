<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use \KC_GLOBAL\Utils;

function _get_options($setting, $default = false){
	return \KC_GLOBAL\Utils::_get($setting, $default = false);
}
function _get_inactive(){
	return \KC_GLOBAL\Utils::_inactive();
}
function kcg__elementor(){
	return \KC_GLOBAL\Utils::kcg__elementor();
}
function kcg__version(){
	return \KC_GLOBAL\Utils::kcg__version();
}
function get_enqueue_dependencies(){
	return \KC_GLOBAL\Utils::get_enqueue_dependencies();
}
function kcg_is_true(){
	return \KC_GLOBAL\Utils::kcg_is_true();
}
function _css_minify($css){
	return \KC_GLOBAL\Utils::_css_minify($css);
}
function kcg_link( $settings_key, $is_echo = true ){
	return \KC_GLOBAL\Utils::kcg_link( $settings_key, $is_echo = true );
}
function kcg_get_post_types($args = [], $array_diff_key = []){
	return \KC_GLOBAL\Utils::kcg_get_post_types($args = [], $array_diff_key = []);
}
function kcg_contact7_activated(){
	return \KC_GLOBAL\Utils::kcg_contact7_activated();
}
function kcg_cf7_list(){
	return \KC_GLOBAL\Utils::kcg_cf7_list();
}
function get_portfolio_categories(){
	return \KC_GLOBAL\Utils::get_portfolio_categories();
}
function get_blog_categories(){
	return \KC_GLOBAL\Utils::get_blog_categories();
}
function kcg__link(array $url_control)
{
	$attributes_url = '';
	$attributes_target = '';
	$attributes_rel = '';

	if ( ! empty( $url_control['url'] ) ) {
		$allowed_protocols = array_merge( wp_allowed_protocols(), [ 'skype', 'viber' ] );
		$attributes_url = ' href="' . esc_url( $url_control['url'], $allowed_protocols ) . '"';

	}else{
		$attributes_url = ' href="#"';
	}

	if ( ! empty( $url_control['is_external'] ) ) {
		$attributes_target = ' target="_blank"';
	}

	if ( ! empty( $url_control['nofollow'] ) ) {
		$attributes_rel = ' rel="nofollow"';
	}
    return $attributes_url . $attributes_target . $attributes_rel;

}