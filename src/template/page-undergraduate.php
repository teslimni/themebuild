<?php
/**
 * Template Name: Undergraduate
 * @package Uni_Theme
 */

get_header();
?>
    <header class="page-header">
        <h1><?php the_title(); ?></h1>
    </header><!-- .page-header -->
	<div id="primary" class="content-area academic-program">
        <aside id="secondary" class="cat-nav">
            <?php get_template_part('template-parts/content', 'course-nav'); ?>
        </aside><!-- #secondary -->
		<main id="main" class="site-main">
          <?php  $grad  = new WP_Query(array( 'page_id' => 411 ));
            if ($grad->have_posts()) : ?>
                <div> Test!!!
                    <?php
                    /* Start the Loop */
                    while ($grad->have_posts()) : $grad->the_post();
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
