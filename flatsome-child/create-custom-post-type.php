<?php

function create_tour_post_type() {
    $labels = array(
        'name'               => 'Tour',
        'singular_name'      => 'Tour',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Tour',
        'edit_item'          => 'Edit Tour',
        'new_item'           => 'New Tour',
        'all_items'          => 'All Tour',
        'view_item'          => 'View Tour',
        'search_items'       => 'Search Tour',
        'not_found'          => 'No courses found',
        'not_found_in_trash' => 'No courses found in Trash',
        'menu_name'          => 'Tour'
    );
    
    $args = array(
        'labels'             => $labels,
        'description'        => 'A tour post type',
        'public'             => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        // 'taxonomies'         => array( 'course_category' ),
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'tour' ),
        'show_in_rest'       => true,
        'rest_base'          => 'tour',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    );
    
    register_post_type( 'tour', $args );
}
add_action( 'init', 'create_tour_post_type' );

function create_tour_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x( 'Tour Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Tour Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tour Categories' ),
        'all_items' => __( 'All Tour Categories' ),
        'parent_item' => __( 'Parent Tour Category' ),
        'parent_item_colon' => __( 'Parent Tour Category:' ),
        'edit_item' => __( 'Edit Tour Category' ),
        'update_item' => __( 'Update Tour Category' ),
        'add_new_item' => __( 'Add New Tour Category' ),
        'new_item_name' => __( 'New Tour Category Name' ),
        'menu_name' => __( 'Tour Categories' ),
    );
 
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tour-category' ),
    );
 
    register_taxonomy( 'tour_category', array( 'tour' ), $args );
}
add_action( 'init', 'create_tour_taxonomies', 0 );



