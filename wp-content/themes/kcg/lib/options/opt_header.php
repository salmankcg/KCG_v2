<?php
// Header Section
Redux::set_section( 'kcg', array(
    'title'            => esc_html__( 'Header', 'kcg' ),
    'id'               => 'kcg_header_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-arrow-up',
));


// Logo
Redux::set_section( 'kcg', array(
    'title'            => esc_html__( 'Logo', 'kcg' ),
    'id'               => 'kcg_logo_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Upload Favicon', 'kcg' ),
            'subtitle'  => esc_html__( 'The faveicon will be display beside title', 'kcg' ),
            'id'        => 'kcg_fav_icon',
            'type'      => 'media',
        ),
    )
) );
