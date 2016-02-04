<!-- flex -->
<?php if ( get_field('flex_name') ): ?>
    <?php while ( has_sub_field('flex_name') ): ?>

        <?php if ( get_row_layout() == 'sub_field_name' ): ?>
            <div class="post" style="background: <?php the_sub_field('bg'); ?>;">
                <h4><?php the_sub_field('title'); ?></h4>
                <?php the_sub_field('text'); ?>
            </div>
        <?php elseif(get_row_layout() == 'sub_field_name'): ?>
            <div class="post" style="<?php echo image_src(get_sub_field('bg'), 'post', true); ?>">
                <h4><?php the_sub_field('title'); ?></h4>
                <?php the_sub_field('text'); ?>
                <a href="<?php the_sub_field('link'); ?>" target="_blank">Get insights</a>
                <div class="like"></div>
            </div>
        <?php elseif(get_row_layout() == 'sub_field_name'): ?>
            <div class="large_post" style="<?php echo image_src(get_sub_field('bg'), 'large_post', true); ?>">
                <h4><?php the_sub_field('title'); ?></h4>
                <?php the_sub_field('text'); ?>
            </div>
        <?php endif; ?>

    <?php endwhile ?>
<?php else : ?>
<?php endif; ?>

<!-- repeater -->

<?php if(get_field('repeater_name')): ?>
    <div class="inner">
        <?php while(has_sub_field('repeater_name')): ?>
            <div class="item">
                <strong><?php the_sub_field('bold'); ?></strong>
                <?php the_sub_field('content'); ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
