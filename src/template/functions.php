<?php
/**
 * Uni Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Uni_Theme
 */

if (! function_exists('uni_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function uni_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Uni Theme, use a find and replace
         * to change 'uni' to the name of your theme in all the template files.
         */
        load_theme_textdomain('uni', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('big_feature', 1287, 460, true); // for news feature and admission feature
        add_image_size('small_thumb', 300, 200, true);
        add_image_size('medium_thumb', 410, 255, true); // for academic and campus section thumbnails

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main' => esc_html__('Main Menu', 'uni'),
            'secondary' => esc_html__('Secondary Menu', 'uni'),
            'undergrad' => esc_html__('Undergrad Menu', 'uni'),
            'mobile' => esc_html__('Mobile Menu', 'uni'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('uni_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for the in-built custom Post  Formats
        add_theme_support('post-formats', ['gallery', 'quote', 'video', 'audio', 'chat']);

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'uni_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uni_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('uni_content_width', 640);
}
add_action('after_setup_theme', 'uni_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uni_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'uni'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'uni'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'uni_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function uni_scripts()
{
    wp_enqueue_style('uni-style', get_stylesheet_uri());
    wp_enqueue_style(
        'google-font',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600'
);

    wp_enqueue_script('uni-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true);


    // wp_enqueue_script('uni-navigation', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true);
    
    // wp_enqueue_script('uni-mobile-nav', get_template_directory_uri() . '/js/scripts.js', array(''), '20151215', true);

    // wp_enqueue_script('admin-bar-fix', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20151215', true);

    // wp_enqueue_script('uni-skip-link-focus-fix', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'uni_scripts');

// Customize excerpt's read more link

function uni_get_more_link($post_excerpt)
{
    return $post_excerpt  . ' <a class="read__more-link" href="'. get_permalink(get_the_ID()) . '">' . __('Read More...', 'uni')  . '</a>';
}
add_filter('wp_trim_excerpt', 'uni_get_more_link');

//  Customize number of excerpt's words

function uni_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'uni_excerpt_length', 999);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Uni Theme plugins specifically meant for this theme
 */
// require get_template_directory() . '/inc/uni-theme-plugins.php';
