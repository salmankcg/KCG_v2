<?php

    $slug_portfolio = 'portfolios';
    $slug_portfolio_cat = 'portfolio-category';

	$por_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array( 'title', 'editor'),
		'rewrite' 	=> array(
			'slug' => $slug_portfolio
		),
		'has_archive' => true 
	);

	$por_arr = apply_filters( 'kcg_portfolio_post_type_args', $por_arr );
	
	$por_tax_arr = array(
		"Categories"   => array( 
			'singular_name' => 'Category',
			'query_var' => 'portfolio_cat',
			'rewrite' => array( 
				'slug' => $slug_portfolio_cat
			) 
		) 
	);

	$portfolio = new Kcg_Post_Type('portfolio', 'Portfolio', 'Portfolio', $por_arr);
	$portfolio->taxonomies('Portfolio', $por_tax_arr);

//adding column to portfolio posts type
add_filter( 'manage_edit-kcg_portfolio_columns', 'my_edit_kcg_portfolio_columns' ) ;

function my_edit_kcg_portfolio_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__('All Portfolio', 'kcg' ),
		'id' => esc_html__('Id', 'kcg' ),
		'name' => esc_html__('Name', 'kcg' ),
		'year' => esc_html__('Year', 'kcg' ),
		'type' => esc_html__('Type', 'kcg' ),
		'date' => esc_html__('Created', 'kcg' )
		);
	return $columns;
}

//adding column to portfolio posts type
add_action( 'manage_kcg_portfolio_posts_custom_column', 'my_manage_portfolio_columns', 10, 2 );
function my_manage_portfolio_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;
		case 'name' :
			$post_name = get_post_meta($post_id,'_kcg_client_name');
			if(!empty($post_name)){
				printf( $post_name[0] );
			}
		break;
		case 'year' :
			$post_year = get_post_meta($post_id,'_kcg_year');
			printf( $post_year[0] );
		break;
		case 'type' :
			$categories = get_the_terms( $post_id, 'kcg_categories' );
			if(!empty($categories)){
				foreach( $categories as $category ) {
					printf(  $category->name . '<br />');
				}
			}
		break;

		default :
		break;
	}
}

	$slug_teams = 'teams';

	$team_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array( 'title', 'thumbnail', 'editor'),
		'rewrite' 	=> array(
			'slug' => $slug_teams
		),
		'has_archive' => true 
	);

	$team_arr = apply_filters( 'kcg_team_post_type_args', $team_arr );

 new Kcg_Post_Type('team', 'Team Member', 'Team Member', $team_arr);

 $slug_journal = 'journals';
    $slug_journal_cat = 'journal-category';
    $slug_journal_tag = 'journal-tag';

	$jour_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array( 'title', 'editor'),
		'rewrite' 	=> array(
			'slug' => $slug_journal
		),
		'has_archive' => true 
	);

	$jour_arr = apply_filters( 'kcg_journal_post_type_args', $jour_arr );
	
	$jour_tax_arr = array(
		"Journal Categories"   => array( 
			'singular_name' => 'Category',
			'query_var' => 'journal_cat',
			'rewrite' => array( 
				'slug' => $slug_journal_cat
			) 
		) 
	);
	$jour_tag_arr = array(
		"Journal Tags"   => array( 
			'singular_name' => 'Tag',
			'query_var' => 'journal_tag',
			'rewrite' => array( 
				'slug' => $slug_journal_tag
			) 
		) 
	);

	$journal = new Kcg_Post_Type('journal', 'Journal', 'Journal', $jour_arr);
	$journal->taxonomies('journal', $jour_tax_arr);
	$journal->taxonomies('journal', $jour_tag_arr);

//adding column to journal posts type
add_filter( 'manage_edit-kcg_journal_columns', 'my_edit_kcg_journal_columns' ) ;

function my_edit_kcg_journal_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__('All Journal', 'kcg' ),
		'id' => esc_html__('Id', 'kcg' ),
		'writer_name' => esc_html__('Writer', 'kcg' ),
		'publishdate' => esc_html__('Publish Date', 'kcg' ),
		'type' => esc_html__('Categories', 'kcg' ),
		'date' => esc_html__('Created', 'kcg' )
		);
	return $columns;
}

//adding column to journal posts type
add_action( 'manage_kcg_journal_posts_custom_column', 'my_manage_journal_columns', 10, 2 );
function my_manage_journal_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;
		case 'writer_name' :
			$writer_name = get_post_meta($post_id,'_kcg_writer_name');
			if(!empty($writer_name)){
				printf( $writer_name[0] );
			}
		break;
		case 'publishdate' :
			$post_publish = get_post_meta($post_id,'_kcg_publish');
			if(!empty($post_publish)){
				printf( $post_publish[0] );
			}
		break;
		case 'type' :
			$categories = get_the_terms( $post_id, 'kcg_journal_categories' );
			if(!empty($categories)){
				foreach( $categories as $category ) {
					printf(  $category->name . '<br />');
				}
			}
		break;

		default :
		break;
	}
}
$slug_tms = 'testimonials';

	$tms_arr = array(
		'menu_icon' =>'dashicons-testimonial',
		'supports' => array( 'title', 'thumbnail', 'editor'),
		'rewrite' 	=> array(
			'slug' => $slug_tms
		),
		'has_archive' => true 
	);

	$tms_arr = apply_filters( 'kcg_team_post_type_args', $tms_arr );

 new Kcg_Post_Type('testimonial', 'Testimonial', 'Testimonial', $tms_arr);