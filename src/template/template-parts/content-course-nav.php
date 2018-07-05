<?php
if (is_page('undergraduate')) {
    wp_nav_menu(array(
    'theme_location' => 'undergrad',
    'menu_id' => 'undergrad-menu',
    ));
}
if (is_page('graduate')) {
    wp_nav_menu(array(
        'theme_location' => 'graduate',
        'menu_id' => 'graduate-menu',
    ));
}
if (is_page('graduate')) {
    wp_nav_menu(array(
        'theme_location' => 'language-pro',
        'menu_id' => 'language-pro-menu',
    ));
}

if (is_category()) {
    wp_nav_menu(array(
        'theme_location' => 'Categories',
        'menu_id' => 'categories',
    ));
}
