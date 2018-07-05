<?php
/**
 * Template for a single course
 * @package Uni_Theme
 */

get_header();
?>
    <header class="page-header">
        <?php
        the_title('<h1 class="page-title academic-heading"> ', '</h1>'); ?>
    </header><!-- .page-header -->
	<div id="primary" class="content-area academic-program">
        <aside id="secondary" class="cat-nav">
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

            ?>
        </aside><!-- #secondary -->
		<main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <div>
                    <?php
                    /* Start the Loop */
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile; ?>
                </div>
                <?php the_posts_navigation();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            wp_reset_postdata();
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
