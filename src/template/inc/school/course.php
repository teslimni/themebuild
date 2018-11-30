<?php
function course_init()
{
    $labels = array(
        'name'               => _x('Courses', 'post type general name', 'course'),
        'singular_name'      => _x('Course', 'post type singular name', 'course'),
        'menu_name'          => _x('Courses', 'admin menu', 'course'),
        'name_admin_bar'     => _x('Courses', 'add new on admin bar', 'course'),
        'add_new'            => _x('Add New', 'course', 'course'),
        'add_new_item'       => __('Add New Course', 'course'),
        'new_item'           => __('New Course', 'course'),
        'edit_item'          => __('Edit Course', 'course'),
        'view_item'          => __('View Course', 'course'),
        'all_items'          => __('All Courses', 'course'),
        'search_items'       => __('Search Courses', 'course'),
        'parent_item_colon'  => __('Parent Courses:', 'course'),
        'not_found'          => __('No Courses found.', 'course'),
        'not_found_in_trash' => __('No Courses found in Trash.', 'course')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('A custom post type for courses.', 'course'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'Courses'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'supports'           => array('title', 'editor', 'author', 'thumbnail'),
        'taxonomies'         => array('category', 'tags')
    );

    register_post_type('uni_course', $args);
}
// add_action('init', 'school_init');
