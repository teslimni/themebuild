<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Uni_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'uni'); ?></a>
	<header id="masthead" class="brand site-header">
		<section class="brand-strip">	
			<div class="site-branding">
				<?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                    ?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
                else :
                    ?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
                endif;
                $uni_description = get_bloginfo('description', 'display');
                if ($uni_description || is_customize_preview()) :
                    ?>
					<p class="site-description"><?php echo $uni_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<nav class="extra-nav">
					<?php 
                        wp_nav_menu(array(
                            'theme_location' => 'Categories Menu',
                            'menu_id' => 'categories-menu',
                        ));
                    ?>
			</nav><!-- extra-nav -->
				<button id="search-toggle">Search</button>
                <button class="menu-toggle" aria-controls="main-menu" aria-expanded="false"> 
					<div class="mobile">
						<div class="mobile__nav-icon">
							<span class="nav-icon">&nbsp;</span>
						</div>
                    </div>
				</button>
				<div class="mobile__nav">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'Categories',
                            'menu_id' => 'categories-menu',
                        ));
                    ?>
                </div>
		</section>	
	</header><!-- #masthead -->
	<div id="content" class="site-content">
