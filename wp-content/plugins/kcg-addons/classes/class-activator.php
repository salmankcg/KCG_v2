<?php
namespace KC_GLOBAL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class kcg__Activator{
    
    public static function kcg__activate() {
		flush_rewrite_rules();
	}
}