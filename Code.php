/* Template Name: Example Template */

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

/ ------------------------------------- /
/* Allow Contact Form 7 Forms to include shortcodes
/ ------------------------------------- /

 add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' ); 
 function mycustom_wpcf7_form_elements( $form ) {
  $form = parse_shortcode_content( $form );
  $array = array (
                 '<p>[' => '[',
                 ']</p>' => ']',
                 ']<br />' => ']'
         );
 
     $form = strtr($form, $array);
  $form = do_shortcode( $form );
  return $form;
 }


<!-- shortcode for Contact Form 7 -->
<?php echo do_shortcode('[contact-form-7 id="188" title="Main Contact Form"]'); ?>

<!-- echo svg icon -->
<?php echo file_get_contents($it["picture"]); ?>

<!-- echo yoast breadcrumbs -->
<?php if (function_exists('yoast_breadcrumb')) yoast_breadcrumb('<div class="breadcrumbs__inner">', '</div>'); ?>

<!-- map shortcode -->
<?php if ($contact_map = get_field('map')) {
	echo do_shortcode('[googlemap id="contact_map" height="460px" coordinates="' .$contact_map['lat']. ', ' .$contact_map['lng']. '"][/googlemap]');
} ?>

<?php
// Must have wp_pagenavi plugin installed. Custom Post Type names can not clash with page names or 404's will occur on /page/#/ (Utilize Custom Rewrite Slug in CPT)

            // The press release loop
            $the_press = new WP_Query(array('post_type' => 'press-releases','posts_per_page' => 10,'paged'=> get_query_var('paged') ));
            // The Loop
            while ($the_press->have_posts()) : $the_press->the_post();
                ?>
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
                <p><a href="<?php echo the_permalink(); ?>" >Read More</a></p>
            <?php endwhile; ?>
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=> $the_press));} ?>
<?php wp_reset_postdata();?>
