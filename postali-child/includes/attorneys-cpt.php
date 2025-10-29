<?php
/**
 * Custom Case Results Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_staff() {

// set up labels
    $labels = array(
        'name' => 'Staff',
        'singular_name' => 'Staff',
        'add_new' => 'Add New Staff',
        'add_new_item' => 'Add New Staff',
        'edit_item' => 'Edit Staff',
        'new_item' => 'New Staff',
        'all_items' => 'All Staff',
        'view_item' => 'View Staff',
        'search_items' => 'Search Staff',
        'not_found' =>  'No Staff Found',
        'not_found_in_trash' => 'No Staff found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Staff',

    );
    //register post type
    register_post_type( 'Staff', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-businessman',
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'our-team', 'with_front' => false )
        )
    );

}

add_action( 'init', 'create_custom_post_type_staff' );

function register_staff_role() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Roles', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Role', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Roles', 'textdomain' ),
        'all_items'         => __( 'All Roles', 'textdomain' ),
        'view_item'         => __( 'View Role', 'textdomain' ),
        'parent_item'       => __( 'Parent Role', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Role:', 'textdomain' ),
        'edit_item'         => __( 'Edit Role', 'textdomain' ),
        'update_item'       => __( 'Update Role', 'textdomain' ),
        'add_new_item'      => __( 'Add New Role', 'textdomain' ),
        'new_item_name'     => __( 'New Role Name', 'textdomain' ),
        'not_found'         => __( 'No Roles Found', 'textdomain' ),
        'back_to_items'     => __( 'Back to Roles', 'textdomain' ),
        'menu_name'         => __( 'Role', 'textdomain' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'role' ),
    );
 
    register_taxonomy( 'role', array( 'staff' ), $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'register_staff_role', 0 );