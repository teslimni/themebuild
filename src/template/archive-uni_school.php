<?php
/**
 * The template for displaying  the University of Abidjan school archive page
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
                the_archive_title('<h1 class="page-title">', '</h1>');
                // the_archive_description('<div class="archive-description">', '</div>');
                ?>
			</header><!-- .page-header -->

            <div class="school__grid">
			<?php
            /* Start the Loop */
            while (have_posts()) :
                the_post(); ?>
              <?php  get_template_part('template-parts/content', get_post_type()); 
            endwhile; ?>
            </div>
        <?php
            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
