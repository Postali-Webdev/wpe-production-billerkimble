<?php
/**
 * Custom Attorneys Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_active_cases() {

// set up labels
    $labels = array(
        'name' => 'Active Cases',
        'singular_name' => 'Active Case',
        'add_new' => 'Add New Active Case',
        'add_new_item' => 'Add New Active Case',
        'edit_item' => 'Edit Active Case',
        'new_item' => 'New Active Case',
        'all_items' => 'All Active Cases',
        'view_item' => 'View Active Cases',
        'search_items' => 'Search Active Cases',
        'not_found' =>  'No Active Cases Found',
        'not_found_in_trash' => 'No Active Cases found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Active Cases',

    );
    //register post type
    register_post_type( 'active-cases', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-flag',
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'taxonomies'            => array('case-status'),
        'rewrite' => array( 'slug' => 'active-cases', 'with_front' => false ),
        ),
    );

}
add_action( 'init', 'create_custom_post_type_active_cases', 0 );

// Create custom taxonomy for attorneys CPT
function create_active_cases_status() {
    $labels = array(
        'name' => _x( 'Case Status', 'taxonomy general name' ),
        'singular_name' => _x( 'Case Status', 'taxonomy singular name' ),
        'search_items' =>  __( 'Case Statuses' ),
        'all_items' => __( 'All Case Statuses' ),
        'parent_item' => __( 'Parent Case Status' ),
        'parent_item_colon' => __( 'Parent Case Status:' ),
        'edit_item' => __( 'Edit Case Status' ), 
        'update_item' => __( 'Update Case Status' ),
        'add_new_item' => __( 'Add New Case Status' ),
        'new_item_name' => __( 'New Case Status' ),
        'menu_name' => __( 'Case Statuses' ),
    );    
    
    register_taxonomy('case-status',array('active-cases'), array(
        'labels' => $labels,
        'has_archive' => false,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'show_admin_column' => true,
        'hierarchical' => true,
        //'rewrite' => array( 'slug' => 'attorneys', 'with_front' => false ),
    ));
    
}
add_action( 'init', 'create_active_cases_status', 0 );


// Create custom taxonomy for attorneys CPT
function create_active_cases_taxonomy() {
    $labels = array(
        'name' => _x( 'Case Type', 'taxonomy general name' ),
        'singular_name' => _x( 'Case Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'Case Types' ),
        'all_items' => __( 'All Case Types' ),
        'parent_item' => __( 'Parent Case Type' ),
        'parent_item_colon' => __( 'Parent Case Type:' ),
        'edit_item' => __( 'Edit Case Type' ), 
        'update_item' => __( 'Update Case Type' ),
        'add_new_item' => __( 'Add New Case Type' ),
        'new_item_name' => __( 'New Case Type' ),
        'menu_name' => __( 'Case Types' ),
    );    
    
    register_taxonomy('case-type',array('active-cases'), array(
        'labels' => $labels,
        'has_archive' => false,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'show_admin_column' => true,
        'hierarchical' => false,
    ));
    
}
add_action( 'init', 'create_active_cases_taxonomy', 0 );