<?php

Redux::set_section('kcg', array(
	'title'     => esc_html__( 'Footer', 'kcg' ),
	'id'        => 'kcg_page',
	'icon'      => 'dashicons dashicons-admin-post',
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'Footer Content', 'kcg' ),
    'id'        => 'kcg_footer_content',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
         array(
            'title'     => esc_html__( 'Show/Hide Heading', 'kcg' ),
            'subtitle'  => __('Choose this option to show the heading (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_footer_heading_show',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__('Heading Text', 'kcg'),
            'subtitle' => esc_html__('This content will be shown at the footer.', 'kcg'),
            'id'        => 'footer_heading',
            'type'      => 'editor',
            'default'   => 'Want to start a new project?<br><strong>Let\'s get to work!</strong>',
            'required'    => array('is_footer_heading_show', '=', true),
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            ),
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Button', 'kcg' ),
            'subtitle'  => __('Choose this option to show the button (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_footer_btn_show',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'id'    => 'footer_btn_text',
            'type'  => 'text',
            'title' => esc_html__( 'Button Text', 'kcg' ),
            'subtitle' => esc_html__('This content will be shown at the footer button.', 'kcg'),
            'default'    => 'GET IN TOUCH',
            'required'    => array('is_footer_btn_show', '=', true)
        ),
        array(
            'id'    => 'footer_btn_url',
            'type'  => 'text',
            'title' => esc_html__( 'Button Url', 'kcg' ),
            'subtitle' => esc_html__('This url will be shown at the footer button.', 'kcg'),
            'default'    => esc_url(home_url('/')),
            'required'    => array('is_footer_btn_show', '=', true)
        ),
    )
));