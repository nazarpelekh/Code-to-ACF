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
	echo do_shortcode('[googlemap id="contact_map" height="460px" coordinates="' .$contact_map['lat']. ', ' .$contact_map['lng']. '"][{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#cc3636"},{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"on"},{"hue":"#80ff00"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#ff0e00"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"hue":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"administrative.land_parcel","elementType":"labels.icon","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"color":"#e7e7e7"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"saturation":"47"},{"invert_lightness":true},{"weight":"9.21"},{"gamma":"10.00"},{"visibility":"off"},{"hue":"#39ff00"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"hue":"#aaff00"},{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.natural","elementType":"geometry.stroke","stylers":[{"color":"#964c4c"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"color":"#f51414"}]},{"featureType":"landscape.natural","elementType":"labels.text.stroke","stylers":[{"color":"#ae0303"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"landscape.natural.terrain","elementType":"labels.text.stroke","stylers":[{"hue":"#ff0000"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"hue":"#ff0000"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#d1e79c"},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#aabcca"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#a8becc"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"hue":"#ff0000"}]},{"featureType":"road.highway.controlled_access","elementType":"labels","stylers":[{"hue":"#008fff"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#ff0000"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"hue":"#ff0000"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#ff0000"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#f20000"},{"visibility":"off"}]},{"featureType":"transit.line","elementType":"labels","stylers":[{"visibility":"on"},{"color":"#732c2c"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#229fd2"},{"visibility":"on"}]}][/googlemap]');
} ?>
