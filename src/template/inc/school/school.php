<?php
function school_init()
{
    $labels = array(
        'name'               => _x('Schools', 'post type general name', 'school'),
        'singular_name'      => _x('School', 'post type singular name', 'school'),
        'menu_name'          => _x('Schools', 'admin menu', 'school'),
        'name_admin_bar'     => _x('Schools', 'add new on admin bar', 'school'),
        'add_new'            => _x('Add New', 'school', 'school'),
        'add_new_item'       => __('Add New School', 'school'),
        'new_item'           => __('New School', 'school'),
        'edit_item'          => __('Edit School', 'school'),
        'view_item'          => __('View School', 'school'),
        'all_items'          => __('All Schools', 'school'),
        'search_items'       => __('Search Schools', 'school'),
        'parent_item_colon'  => __('Parent Schools:', 'school'),
        'not_found'          => __('No Schools found.', 'school'),
        'not_found_in_trash' => __('No Schools found in Trash.', 'school')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('A custom post type for Schools.', 'school'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'schools'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'supports'           => array('title', 'editor', 'author', 'thumbnail'),
        'taxonomies'         => array('category', 'tags')
    );

    register_post_type('uni_school', $args);
}
// add_action('init', 'school_init');
