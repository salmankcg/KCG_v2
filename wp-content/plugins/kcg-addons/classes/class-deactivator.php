<?php
namespace KC_GLOBAL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class kcg__Deactivator{
    
    public static function kcg__deactivate() {
        flush_rewrite_rules();
	}
    public static function kcg__user_meta_delete() {
        return delete_user_meta(get_current_user_id(), '_kcg__thanks_notice');
	}
}