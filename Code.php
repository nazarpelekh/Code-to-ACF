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

<!-- alert posts -->

<?php if ( $wp_query->have_posts() ) : ?>

    <?php $args = array(
        'post_type' => 'product',
        'posts_per_page' => '3',
    );
    $wp_query = new WP_Query( $args );
    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="swiper-slide" style="">
            <h4><?php the_title(); ?></h4>
            <span><?php the_field('subtitle'); ?></span>
            <strong><?php the_field('price'); ?></strong>
            <a href="<?php the_permalink(); ?>" class="button"></a>
        </div>
    <?php endwhile; ?>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>

<?php endif; ?>
<?php wp_reset_query(); ?>

<!-- alert image -->
<?php echo image_src(get_field('luxury_background'), 'full', true); ?> <!-- true is parameter background-image -->
