<?php 

function kcg_team_post_type() {
    $labels = array(
        'name'                  => _x( 'Team Member', 'Post type general name', 'kcg' ),
        'singular_name'         => _x( 'Team Member', 'Post type singular name', 'kcg' ),
        'menu_name'             => _x( 'Team Member', 'Admin Menu text', 'kcg' ),
        'name_admin_bar'        => _x( 'Team Member', 'Add New on Toolbar', 'kcg' ),
        'add_new'               => __( 'Add New', 'kcg' ),
        'add_new_item'          => __( 'Add New Team Member', 'kcg' ),
        'new_item'              => __( 'New Team Member', 'kcg' ),
        'edit_item'             => __( 'Edit Team Member', 'kcg' ),
        'view_item'             => __( 'View Team Member', 'kcg' ),
        'all_items'             => __( 'All Team Member', 'kcg' ),
        'search_items'          => __( 'Search Team Member', 'kcg' ),
        'parent_item_colon'     => __( 'Parent Team Member:', 'kcg' ),
        'not_found'             => __( 'No Team Member found.', 'kcg' ),
        'not_found_in_trash'    => __( 'No Team Member found in Trash.', 'kcg' ),
        'featured_image'        => _x( 'Team Member Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kcg' ),
        'set_featured_image'    => _x( 'Set image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'remove_featured_image' => _x( 'Remove image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'use_featured_image'    => _x( 'Use as team member image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'archives'              => _x( 'Team Member archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kcg' ),
        'insert_into_item'      => _x( 'Insert into team member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kcg' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this team member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kcg' ),
        'filter_items_list'     => _x( 'Filter Team Member list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kcg' ),
        'items_list_navigation' => _x( 'Team Member list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kcg' ),
        'items_list'            => _x( 'Team Member list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kcg' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Team Member custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kcg' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'kcg_team', $args );
}
add_action( 'init', 'kcg_team_post_type' );

function kcg_portfolio_post_type() {
    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post type general name', 'kcg' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'kcg' ),
        'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'kcg' ),
        'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'kcg' ),
        'add_new'               => __( 'Add New', 'kcg' ),
        'add_new_item'          => __( 'Add New Portfolio', 'kcg' ),
        'new_item'              => __( 'New Portfolio', 'kcg' ),
        'edit_item'             => __( 'Edit Portfolio', 'kcg' ),
        'view_item'             => __( 'View Portfolio', 'kcg' ),
        'all_items'             => __( 'All Portfolio', 'kcg' ),
        'search_items'          => __( 'Search Portfolio', 'kcg' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'kcg' ),
        'not_found'             => __( 'No Portfolio found.', 'kcg' ),
        'not_found_in_trash'    => __( 'No Portfolio found in Trash.', 'kcg' ),
        'featured_image'        => _x( 'Portfolio Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kcg' ),
        'set_featured_image'    => _x( 'Set image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'remove_featured_image' => _x( 'Remove image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'use_featured_image'    => _x( 'Use as Portfolio image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kcg' ),
        'archives'              => _x( 'Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kcg' ),
        'insert_into_item'      => _x( 'Insert into portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kcg' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kcg' ),
        'filter_items_list'     => _x( 'Filter Portfolio list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kcg' ),
        'items_list_navigation' => _x( 'Portfolio list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kcg' ),
        'items_list'            => _x( 'Portfolio list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kcg' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Portfolio custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'kcg' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'show_in_rest'       => true
    );
      
    register_post_type( 'kcg_portfolio', $args );
}
//add_action( 'init', 'kcg_portfolio_post_type' );