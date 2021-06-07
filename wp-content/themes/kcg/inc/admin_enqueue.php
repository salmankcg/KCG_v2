<?php

add_action( 'admin_enqueue_scripts', 'kcg_admin_enqueues');

function kcg_admin_enqueues() {
  
    if(function_exists('get_current_screen')){
    
        $screen = get_current_screen(); 
        
        if($screen->base == 'toplevel_page_kcg_options') {
            wp_enqueue_style( 'kcg-redux-style', KCG_ASSETS.'/admin/css/redux-style.css' );
        }
    }
    
}
