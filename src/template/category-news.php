<?php
/**
 * The template for displaying news category archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Uni_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            
                <?php if (have_posts()) : ?>

                    <header class="page-header">

                        <?php
                        single_cat_title('<h1 class="page-title">School ', '</h1>');
                        category_description('<div class="category-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                    <div class="grid">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'news');

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
get_sidebar();
get_footer();
