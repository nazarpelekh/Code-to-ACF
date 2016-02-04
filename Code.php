<!-- flex -->
<?php if ( get_field('flex_name') ): ?>
    <?php while ( has_sub_field('flex_name') ): ?>

        <?php if ( get_row_layout() == 'sub_field_name' ): ?>
            <div class="item">
                <?php the_sub_field('something'); ?>
            </div>
        <?php elseif(get_row_layout() == 'sub_field_name'): ?>
            <div class="item">
                <?php the_sub_field('something'); ?>
            </div>
        <?php elseif(get_row_layout() == 'sub_field_name'): ?>
            <div class="item">
                <?php the_sub_field('something'); ?>
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
                <?php the_sub_field('something'); ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
