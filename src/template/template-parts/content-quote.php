<?php
    if (have_rows('staff_reaction_section')) : while (have_rows('staff_reaction_section')) : the_row(); ?>
        <?php if (get_row_layout() == 'reaction') : ?>
            <img src="#" alt="">
            <p><span class="dashicons dashicons-format-quote"> </span><?php the_sub_field('quote'); ?></p>
            <div class="attribution">
                <h3><?php the_sub_field('name'); ?></h3>
                <p><?php the_sub_field('position'); ?></p>
                <div class="jump-link">
                    <a href="<?php the_sub_field('link_to_read_more'); ?>"><?php the_sub_field('read_more_text'); ?>&raquo;</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; endif; ?>




    