<?php 
/**
* Template Name: Front Page
*/
get_header('front');
?>
    <div class="content-wrap">
        <main class="main js-section-hook" id="main" role="main" tabindex="-1">
            <h2 class="sr-only-element" id="main-content">Main Content</h2>
            <section class="collections">
                <section id="news" class="collection news">
                    <?php $args = array(
                        'posts_per_page' => 5,
                        'category_name' => 'news',
                    ) ; ?>
                    <?php $query = new WP_Query($args); ?>
                    <?php if ($query->have_posts()) : ?>
                    <header>
                        <h2 id="bookmark" class="collection__header">UNIABIDJAN Today</h2>
                        <p class="collection__kicker">The latest news from UNIABIDJAN</p>
                    </header>
                    <div class="content">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <article class="card">
                            <div class="article__inner">
                                <figure>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('big_feature'); ?>
                                    </a>
                                </figure>
                                <div class="article__content">
                                    <div class="post-meta">
                                        <p class="post-category"><?php the_category(' , '); ?></p>
                                    </div>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                    </h3>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; ?>
                        <section class="cta">
                            <a href="category/news">More UNIABIDJAN News</a>
                        </section>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </section>
                <section id="newsletter" class="collection newsletter">
                    <h2 class="newsletter__heading">Get daily news updates from
                        <em>UniAbidjan Report</em>
                    </h2>
                    <form action="#">
                        <div class="input-wrapper">
                            <input type="email" name="nemail" id="nemail" placeholder="Enter your email address">
                        </div>
                        <input type="submit" value="Sign Up" name="subscribe">
                    </form>
                </section>
                <section id="events" class="collection events">
                    <div class="event__items">
                        <div class="event__heading-container">
                            <h2 class="event__heading">UniAbidjan Events</h2>
                            <p>What's happening on campus</p>
                        </div>
                        <div class="content">
                            <?php 
                                $data = array(
                                    'posts_per_page' => 4,
                                    'category_name' => 'events',
                                );
                                $event = new WP_Query($data);
                            ?>
                            <?php if ($event->have_posts()) : while ($event->have_posts()) : $event->the_post(); ?>
                            <figure>
                                <a href="<?php the_permalink(); ?>" class="img-wrapper">
                                    <?php the_post_thumbnail('small_thumb'); ?>
                                </a>
                                <?php if (have_rows('event')) : while (have_rows('event')) : the_row(); ?>
                                    <?php if (get_row_layout() == 'event_data') : ?>
                                        <div class="date">
                                            <span class="month"><?php echo the_sub_field('month'); ?></span>
                                            <span class="day"><?php echo the_sub_field('day'); ?></span>
                                        </div>
                                        <div class="event__content">
                                            <?php if (has_tag()) : ?>
                                                <p class="tag"><?php the_tags(''); ?></p>
                                            <?php endif; ?>
                                            <h3>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a>
                                            </h3>
                                            <time><?php echo the_sub_field('time'); ?></time>
                                        </div>
                                    <?php endif; ?>
                                    <?php endwhile; reset_rows();
                                endif; ?>
                            </figure>
                            
                            <?php endwhile; wp_reset_postdata();
                            endif;
                            ?>
                            <section class="more_events">
                                <a href="category/events">More UniAbidjan Events</a>
                            </section>
                        </div>
                    </div>
                </section>
                <section id="academic" class="collection academic theme-academic">
                    <div class="academic__items">
                        <div class="academic__heading-container">
                            <h2 class="academic__heading">Academics</h2>
                            <p>Preparing students to make meaningful contributions to society as engaged citizens and leaders in a complex world.</p>
                        </div>
                        <div class="content">
                            <?php $acadata = array(
                                'posts_per_page' => 3,
                                'post_type' => 'page',
                                'post__in' => array(437,438,475),
                                // 'post__in' => array(411,414,475),
                                'order' => 'ASC'
                            ); ?>
                            <?php 
                                $acada = new WP_Query($acadata);
                                if ($acada->have_posts()) : while ($acada->have_posts()) : $acada->the_post();
                            ?>
                            <section class="info">
                                <figure class="landscape">
                                    <picture>
                                        <?php the_post_thumbnail('medium_thumb'); ?>
                                    </picture>
                                </figure>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                                <p class="info-link">
                                    <?php the_category(', '); ?>
                                </p>
                            </section>
                            <?php endwhile; endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <section class="schools">
                        <div class="schools__heading-container">
                            <h3 class="schools__heading">
                                Four Schools in which to pursue your passions
                            </h3>
                        </div>
                        <div class="schools__items">
                            <ul class="courses">
                                <?php 
                                    $schdata = array(
                                        'post_type' => 'uni_school',
                                        'order'    => 'ASC'
                                    );
                                    $sch = new WP_Query($schdata);
                                ?>
                                <?php if ($sch->have_posts()) : while ($sch->have_posts()) : $sch->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                                <?php endwhile; endif;
                                wp_reset_postdata();
                                 ?>   
                            </ul>
                            <div class="cta">
                                <a href="/schools/">More about Academics</a>
                            </div>
                        </div>
                    </section>
                </section>
                <section id="quote" class="quote">
                    <picture>
                        <img class="bg-img" src="#" alt="" srcset="">
                    </picture>
                    <div class="content quote__item">
                       <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            
                            <?php get_template_part('template-parts/content', 'quote'); ?>
                            <?php endwhile; endif; wp_reset_postdata(); ?>   
                    </div>
                </section>
                   
                <section id="campus" class="collection campus">
                    <div class="campus__items">
                        <header class="campus__heading-container">
                            <h2 class="collection__header campus__heading">Campus Life</h2>
                            <p class="collection__kicker">A thriving community of creative and accomplished people around the world</p>
                        </header>
                        <div class="content">
                            <?php $camp = array(
                                'posts_per_page' => 3,
                                'category_name' => 'school-life',
                                'order' => 'ASC'
                            ); ?>
                            <?php 
                            $campus = new WP_Query($camp);
                            if ($campus->have_posts()) : while ($campus->have_posts()) : $campus->the_post();
                            ?>
                                <section class="campus__info">
                                    <figure class="landscape">
                                        <picture>
                                            <?php the_post_thumbnail('medium_thumb'); ?>
                                        </picture>
                                    </figure>
                                    <h3><?php the_title(); ?></h3>
                                    <p<?php the_excerpt(); ?>
                                        <div class="campus-link">
                                            <?php the_category(','); ?>&raquo;
                                        </div>
                                    </p>
                                </section>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <div class="cta">                             
                                <a href="/category/school-life/">More About Campus Life</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="admission" class="collection admission">
                    <div class="admission__items">
                        <header class="admission__heading-container">
                            <h2 class="admission__heading collection__header">Admission</h2>
                            <div class="collection__kicker">Diverse perspectives brought together by a shared commitment to excellence,learning and growing</div>
                        </header>
                        <div class="admission-grid">
                            <section class="learning">
                                <div class="content">
                                    <div class="admission__info">
                                        <?php $feature = array(
                                            'posts_per_page' => 1,
                                            'post_type' => 'post',
                                            'category_name' => 'admissions',
                                            'p' => 277
                                        );
                                            $entry = new WP_Query($feature);
                                        ?>
                                        <?php if ($entry->have_posts()) : while ($entry->have_posts()) : $entry->the_post(); ?>
                                        <figure>
                                            <picture>
                                                <?php the_post_thumbnail('big_feature'); ?>
                                            </picture>
                                            <figcaption>
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <?php the_excerpt(); ?>
                                            </figcaption>
                                        </figure>
                                    <?php endwhile; endif; wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </section>

                            <?php $learn = array(
                                'posts_per_page' => 2,
                                'post_type' => 'post',
                                'category_name' => 'admissions',
                                'offset' => 2
                            );
                            $moreentry = new WP_Query($learn);
                            ?>
                                        <?php if ($moreentry->have_posts()) : while ($moreentry->have_posts()) : $moreentry->the_post(); ?>
                            <section class="learning">
                                <div class="learning__items">
                                    <div class="content">
                                        <section class="learning__info">
                                            <h3 class="learning__header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <?php the_excerpt(); ?>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        <?php endwhile; endif; wp_reset_postdata(); ?>

                            <div class="cta">
                                <a href="/category/admissions">More About Admission</a>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="uni" class="collection uniabj">
                    <div class="uniabj__items">
                        <header class="uniabj__header-container">
                            <h2 class="collection__header uniabj__heading">About UniAbidjan</h2>
                            <p class="collection__kicker">A place for learning, discovery, innovation,expression and discourse</p>
                        </header>
                        <div class="content">
                            <div class="cta">
                                <a href="/about">More About UniAbidjan</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="explore" class="collection explore">
                    <div class="explore__items">
                        <header class="explore__heading-container">
                            <h2 class="collection__header explore__heading">
                                Explore UNIABIDJAN
                            </h2>
                            <ul class="content links-inline courses">
                                <li>
                                    <a href="#">Visitor Information</a>
                                </li>
                                <li>
                                    <a href="#">Virtual Tours</a>
                                </li>
                                <li>
                                    <a href="#">Online Courses</a>
                                </li>
                                <li>
                                    <a href="#">Maps and Directions</a>
                                </li>
                                <li>
                                    <a href="#">Parking and Transortation</a>
                                </li>
                            </ul>
                        </header>
                        <section>
                            <picture>
                                <img src="img/Abidjan3.jpeg" alt="" srcset="#" class="bg-img">
                                <img src="<?php get_template_directory_uri(); ?>/img/Abidjan3.jpeg" alt="" srcset="#" class="bg-img">
                            </picture>
                        </section>
                    </div>
                </section>
            </section>
        </main>
    </div><!-- .content-wrap-->
        <?php get_footer(); ?>
    </div>
</body>
</html>