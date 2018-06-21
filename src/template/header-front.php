<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uni Abidjan</title>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <div class="container">
        <header class="brand site-header" id="masthead" role="banner">
            <section class="brand-strip">
                <div class="site-branding">
                    <!-- <a href="http://uniabidjan.com" rel="home" class="logo">UniAbidjan Test</a> -->
                    <?php the_custom_logo();
                    if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title logo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    endif;
                    $uni_description = get_bloginfo('description', 'display');
                    if ($uni_description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $uni_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav class="extra-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'secondary',
                        'menu_id' => 'secondary-menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->
                
                <button id="search-toggle">Search</button>

                <button class="menu-toggle" aria-controls="main-menu" aria-expanded="false">
                    
                    <?php esc_html_e('Menu', 'uni'); ?>
                </button>
            </section>
            <div class="menu-overlay"></div>
            <nav id="site-navigation" class="main-navigation">
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main',
                    'menu_id' => 'main-menu',
                )); ?>
            </nav>
            <section class="brand__splash">
                <section class="brand__panel">
                    <p class="brand__name">UniAbidjan</p>
                    <p class="splash__scroller">
                        <a href="#bookmark">
                            Explore UniAbidjan
                            <i class="scroll__down"></i>
                        </a>
                    </p>
                    <picture>
                        <img class="splash__img">
                    </picture>
                </section>
            </section>
        </header>
    


    



