<?php
/**
 * The template for displaying the graduate category archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Uni_Theme
 */

get_header();
?>
    <header class="page-header">
        <?php
        single_cat_title('<h1 class="page-title"> ', '</h1>'); ?>
    </header><!-- .page-header -->
    <?php echo category_description(); ?>

	<div id="primary" class="content-area">
        <aside id="secondary" class="cat-nav">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'graduate',
                    'menu_id' => 'graduate-menu',
                ));
            ?>
        </aside><!-- #secondary -->
		<main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <div class="grid">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'graduate');
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
