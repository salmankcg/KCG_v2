<?php 

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

$kcg_prefix = '_kcg_';

$page_metabox = array(
	'metabox'	=> array( 
		'id'         => 'journal',
		'title'      => __( 'Options', 'kcg' ),
		'post_type'  => 'post',
		'context'    => 'normal',
		'priority'   => 'low',
		'tabs' 		 => true,
	),
	'fields'     => array(
		array(
			'title' => esc_html__('Post Settings', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),

		array(
			'id' => $kcg_prefix . 'target',
			'title' => esc_html__('Target', 'kcg'),
			'description' => esc_html__('Do you want to open in new tab?', 'kcg'),
			'desc_tip' => 'Description tip',
			'std'	=> 'new_window',
			'options' => array(
				'_blank' => esc_html__('Open in a new window or tab', 'kcg'),
				'_self' => esc_html__('Open in a same window as it was clicked', 'kcg'),
				),
			'type' => 'select'
		),
		array(
			'id'          => $kcg_prefix . 'bordercolor',
			'title'       => esc_html__('Border Color', 'kcg'),
			'placeholder' => 'You can enter border color name here',
			'description' => esc_html__('You can enter border color name here(Like: orange, yellow). Leave it empty to apply defaults', 'kcg'),
			'std'         => '',
			'type'        => 'text'
		),
		array(
			'title' => esc_html__('Single Page', 'kcg'),
			'icon'  => 'icon-name',
			'type'  => 'heading'
		),
		array(
			'id'          => $kcg_prefix.'writer_name',
			'title'       => esc_html__( 'Writer', 'kcg' ),
			'description' => esc_html__( 'Enter journal writer name (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Saul Tessler',
			'type'        => 'text',
		),
		
		array(
			'id'          => $kcg_prefix.'publish',
			'title'       => esc_html__( 'Publish', 'kcg' ),
			'description' => esc_html__( 'Choose journal publish date (or) Leave it empty to hide.', 'kcg' ),
			'placeholder' => 'Year',
			'std'         => '',
			'type'        => 'date_picker',
		),
	),
);

$page_metabox = new Metabox( $page_metabox );