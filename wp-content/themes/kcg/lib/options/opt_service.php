<?php

Redux::set_section('kcg', array(
	'title'     => esc_html__( 'Service Page', 'kcg' ),
	'id'        => 'kcg_service_page',
	'icon'      => 'dashicons dashicons-menu',
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'Add Menu', 'kcg' ),
    'id'        => 'kcg_service_menu',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'=>'service_menu_id',
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