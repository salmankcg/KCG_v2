<?php

Redux::set_section('kcg', array(
	'title'     => esc_html__( 'About Page', 'kcg' ),
	'id'        => 'kcg_about_page',
	'icon'      => 'dashicons dashicons-menu',
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'Add Menu', 'kcg' ),
    'id'        => 'kcg_about_menu',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'=>'about_menu_id',
            'type' => 'slides',
            'title' => __('Menu Options', 'kcg'),
            'show' => array(
                'title' => true,
                'description' => false,
                'url' => true 
            ),
            'placeholder' => array(
                'title'       => __( 'Menu Title', 'kcg' ),
                'url'         => __( 'Menu Url', 'kcg' ),
            ),
        ),
    )
));