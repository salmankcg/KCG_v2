<?php

Redux::set_section('kcg', array(
	'title'     => esc_html__( 'General', 'kcg' ),
	'id'        => 'kcg_general',
	'icon'      => 'dashicons dashicons-admin-generic',
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'General', 'kcg' ),
    'id'        => 'kcg_general_copyright',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
         array(
            'id'    => 'general_email',
            'type'  => 'text',
            'title' => esc_html__( 'Email', 'kcg' ),
            'subtitle' => esc_html__('This content will be shown at both header and footer.', 'kcg'),
            'default'    => 'info@kingscrestglobal.com'
        ),
         array(
            'id'    => 'general_phone',
            'type'  => 'text',
            'title' => esc_html__( 'Phone', 'kcg' ),
            'subtitle' => esc_html__('This content will be shown at both header and footer.', 'kcg'),
            'default'    => '+1-347-778-2821'
        ),
         array(
            'title'     => esc_html__('Address', 'kcg'),
            'subtitle' => esc_html__('This content will be shown at both header and footer.', 'kcg'),
            'id'        => 'general_address',
            'type'      => 'editor',
            'default'   => '174 W 4th Street, Suite 200<br> New York, NY 10014',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            ),
        ),
        array(
            'title'     => esc_html__('Copyright Header', 'kcg'),
            'subtitle' => esc_html__('This content will be shown at the bottom of header.', 'kcg'),
            'id'        => 'kcg_copyright_header',
            'type'      => 'editor',
            'default'   => '© King\'s Crest Global 2021',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            ),
        ),
        array(
            'title'     => esc_html__('Copyright Footer', 'kcg'),
            'subtitle' => esc_html__('This content will be shown at the bottom of footer.', 'kcg'),
            'id'        => 'kcg_copyright_footer',
            'type'      => 'editor',
            'default'   => '<span class="l-desktop">© King\'s Crest Global 2021</span><span class="l-mobile">© KCG 2021</span>',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny'         => false,
            ),
        ),
         array(
            'id'    => 'general_privacy',
            'type'  => 'text',
            'title' => esc_html__( 'Privacy Url', 'kcg' ),
            'subtitle' => esc_html__('Enter Privacy url (or) Leave it to apply theme default.', 'kcg'),
            'default'    => esc_url(home_url('/'))
        ),
         array(
            'id'    => 'general_cookies',
            'type'  => 'text',
            'title' => esc_html__( 'Cookie Url', 'kcg' ),
            'subtitle' => esc_html__('Enter Cookie url (or) Leave it to apply theme default.', 'kcg'),
            'default'    => esc_url(home_url('/'))
        ),
    )
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'Social Media', 'kcg' ),
    'id'        => 'kcg_general_social',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Show/Hide', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header and footer (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_show_social',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide On Header', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_show_social_h',
            'type'      => 'switch',
            'default'  => true,
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'title'     => esc_html__( 'Show/Hide On Footer', 'kcg' ),
            'subtitle'  => __('Choose this option to show at Footer (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_show_social_f',
            'type'      => 'switch',
            'default'  => true,
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_facebook',
            'type'  => 'text',
            'title' => esc_html__( 'Facebook', 'kcg' ),
            'default'    => '#',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_twitter',
            'type'  => 'text',
            'title' => esc_html__( 'Twitter', 'kcg' ),
            'default'     => '#',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_instagram',
            'type'  => 'text',
            'title' => esc_html__( 'Instagram', 'kcg' ),
            'default'     => '#',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_linkedin',
            'type'  => 'text',
            'title' => esc_html__( 'LinkedIn', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_youtube',
            'type'  => 'text',
            'title' => esc_html__( 'Youtube', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_gplus',
            'type'  => 'text',
            'title' => esc_html__( 'Google Plus', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_dribbble',
            'type'  => 'text',
            'title' => esc_html__( 'Dribbble', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_flickr',
            'type'  => 'text',
            'title' => esc_html__( 'Flickr', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_pinterest',
            'type'  => 'text',
            'title' => esc_html__( 'Pinterest', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_tumblr',
            'type'  => 'text',
            'title' => esc_html__( 'Tumblr', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_vimeo',
            'type'  => 'text',
            'title' => esc_html__( 'Vimeo', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_blogger',
            'type'  => 'text',
            'title' => esc_html__( 'Blogger', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_rss',
            'type'  => 'text',
            'title' => esc_html__( 'RSS', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
        array(
            'id'    => 'general_github',
            'type'  => 'text',
            'title' => esc_html__( 'GitHub', 'kcg' ),
            'default'     => '',
            'required'    => array('is_show_social', '=', true)
        ),
    )
));

Redux::set_section('kcg', array(
    'title'     => esc_html__( 'Options', 'kcg' ),
    'id'        => 'kcg_general_show',
    'icon'      => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Show/Hide Email On Header', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header email(or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_email_h',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Email On Footer', 'kcg' ),
            'subtitle'  => __('Choose this option to show at footer email(or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_email_f',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Phone On Header', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header phone number(or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_phone_h',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Phone On Footer', 'kcg' ),
            'subtitle'  => __('Choose this option to show at footer phone number(or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_phone_f',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Address On Header', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header address (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_address_h',
            'type'      => 'switch',
            'default'  => true,
        ),
        array(
            'title'     => esc_html__( 'Show/Hide Address On Footer', 'kcg' ),
            'subtitle'  => __('Choose this option to show at header address (or) Leave it to apply theme default.', 'kcg'),
            'id'        => 'is_address_f',
            'type'      => 'switch',
            'default'  => true,
        ),
    )
));