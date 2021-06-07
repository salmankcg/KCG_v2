<?php 

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

$kcg_prefix = '_kcg_';

$page_metabox = array(
	'metabox'	=> array( 
		'id'         => 'portfolio',
		'title'      => __( 'Portfolio Options', 'kcg' ),
		'post_type'  => 'kcg_portfolio',
		'context'    => 'normal',
		'priority'   => 'low',
		'tabs' 		 => true,
	),
	'fields'     => array(

		array(
			'title' => esc_html__('Portfolio Settings', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),

		
		array(
			'id' => $kcg_prefix . 'project_url',
			'title' => esc_html__('Project URL', 'kcg'),
			'description' => esc_html__('Type the URL of the project', 'kcg'),
			'desc_tip' => esc_html__('If this field is empty the button wont display', 'kcg'),
			'placeholder' => '',
			'type' => 'text',
		),

		array(
			'id' => $kcg_prefix . 'target',
			'title' => esc_html__('Target', 'kcg'),
			'description' => esc_html__('Do you want to open the project in new tab?', 'kcg'),
			'desc_tip' => 'Description tip',
			'std'	=> 'new_window',
			'options' => array(
				'_blank' => esc_html__('Open in a new window or tab', 'kcg'),
				'_self' => esc_html__('Open in a same window as it was clicked', 'kcg'),
				),
			'type' => 'select'
		),
		array(
			'title' => esc_html__('Front Portfolio', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),

		array(
			'id'           => $kcg_prefix . 'portfolio_image',
			'title'        => esc_html__('Portfolio Thumb', 'kcg'),
			'description'  => esc_html__('Choose/Upload image for portfolio page. This image will display in portfolio list', 'kcg'),
			'option'       => 'image', // image, audio, video
			'multi_select' => false, // true, false
			'type'         => 'media_manager',
		),
		array(
			'title' => esc_html__('Single Portfolio', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),
		array(
			'id'          => $kcg_prefix.'client_name',
			'title'       => esc_html__( 'Client Name', 'kcg' ),
			'description' => esc_html__( 'Enter portfolio client name (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Saul Tessler',
			'type'        => 'text',
		),
		array(
			'id'          => $kcg_prefix.'scope',
			'title'       => esc_html__( 'Scope', 'kcg' ),
			'description' => esc_html__( 'Enter portfolio scope like(UX Strategy, Visual Design, Interactive Design, Front-end Development, Content Management System, Shopify Integration) (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Scope here',
			'type'        => 'textarea',
		),
		
		array(
			'id'          => $kcg_prefix.'year',
			'title'       => esc_html__( 'Year', 'kcg' ),
			'description' => esc_html__( 'Choose portfolio year (2021) (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Year',
			'std'         => '',
			'type'        => 'date_year',
		),
		
		array(
			'id'           => $kcg_prefix . 'portfolio_gallery',
			'title'        => esc_html__('Portfolio Gallery', 'kcg'),
			'description'  => esc_html__('Choose/Upload images for single portfolio', 'kcg'),
			'option'       => 'image', // image, audio, video
			'multi_select' => true, // true, false
			'type'         => 'media_manager',
			
		),
	),
);

$page_metabox = new Metabox( $page_metabox );