<?php 

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

$kcg_prefix = '_kcg_';

$page_metabox = array(
	'metabox'	=> array( 
		'id'         => 'tsm',
		'title'      => __( 'Testimonial Options', 'kcg' ),
		'post_type'  => 'kcg_testimonial',
		'context'    => 'normal',
		'priority'   => 'low',
		'tabs' 		 => true,
	),
	'fields'     => array(

		array(
			'title' => esc_html__('General', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),

		array(
			'id'          => $kcg_prefix.'tsm_role',
			'title'       => esc_html__( 'Designation/ Role', 'kcg' ),
			'description' => esc_html__( 'Enter Designation/Role (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Software Engineer',
			'type'        => 'text',
		),

	),
);

$page_metabox = new Metabox( $page_metabox );