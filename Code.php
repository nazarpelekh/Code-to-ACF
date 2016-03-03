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

<!-- another version-->

<?php if ($repeater_name = get_field('repeater_name' )) { ?>
    <?php foreach ($repeater_name as $name) { ?>
        <div class="item">
            <img src="<?php echo image_src($name['image'], 'small'); ?>" alt="">
            <strong><?php echo $name['title']; ?></strong>
            <p><?php echo $name['text']; ?></p>
        </div>
    <?php } ?>
<?php } ?>

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





<!--site-->
<?php get_header();
$term = get_queried_object();
$cID = $term->term_id;
$children = get_terms( $term->taxonomy, array(
    'parent'    => $cID,
    'hide_empty' => false,
    'orderby' => 'term_order',
    'order' => 'ASC',
    'hide_empty'        => 0,
    'parent'        => 0,
    'taxonomy'      => 'category'
));
?>
<section class="content">
    <div class="top option" style="<?php echo image_src(get_field('blog_background', 'option'), 'full', true); ?>">
        <div class="wrap">
            <div class="category">
                <?php

                $libargs=array(
                    'hide_empty'        => 0,
                    'parent'        => 0,
                    'taxonomy'      => 'category');

                $libcats=get_categories($libargs);

                foreach($libcats as $lc){ ?>
                    <a class="single-cat" href="<?php echo get_category_link($lc->term_id); ?>">
                        <img src="<?php echo image_src(get_field('image_cat', 'category_'.$lc->term_id), 'category'); ?>" />
                        <div class="bottom">
                            <span><?php echo $lc->name; ?></span>
                        </div>
                    </a>

                <?php } ?>
            </div>
        </div>
    </div>
    <div class="wrap">
        <article>
            <h3><?php single_cat_title( '', true ); ?></h3>
            <div class="posts">
<!--                --><?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
<!--                    <div class="post">-->
<!--                        --><?php //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post', true ); { ?>
<!--                            <a href="--><?php //the_permalink(); ?><!--">-->
<!--                                <img src="--><?php //echo $thumb[0]; ?><!--" alt="">-->
<!--                            </a>-->
<!--                        --><?php //} ?>
<!--                        <h5><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h5>-->
<!--                    </div>-->
<!--                --><?php //endwhile; endif; ?>
                <?php

                $lib=array(
                    'parent'        => $lc,);

                $lib=get_categories($lib);

                foreach($lib as $lic){ ?>
                    <a class="single-cat" href="<?php echo get_category_link($lic->term_id); ?>">
                        <img src="<?php echo image_src(get_field('image_cat', 'category_'.$lic->term_id), 'category'); ?>" />
                        <div class="bottom">
                            <span><?php echo $lic->name; ?></span>
                        </div>
                    </a>

                <?php } ?>
            </div>
        </article>
        <aside>
            <?php require_once('sidebar.php') ?>
        </aside>
    </div>
</section>
<?php get_footer(); ?>
