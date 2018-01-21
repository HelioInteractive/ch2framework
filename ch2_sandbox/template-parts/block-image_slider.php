<?php
/**
 * Template part for displaying a Image slider.
 */


wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/js/slick-min.js', array( jquery ), '1.8', false );

wp_enqueue_script( 'slick-fire', get_template_directory_uri() . '/assets/js/slick-fire-min.js', array( jquery ), '1', true );

wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/sass/slick.css' );

wp_enqueue_style( 'slick-css-theme', get_template_directory_uri() . '/assets/sass/slick-theme.css' );

?>

<section
        class="block image_slider default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="image_slider--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

							<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h3 class="image_slider--title"> <?php the_sub_field( 'heading' ); ?></h3>
							<?php endif; ?>

							<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="image_slider--copy"> <?php the_sub_field( 'copy' ); ?></div>
							<?php endif; ?>

							<?php if ( have_rows( 'slider' ) ) : ?>
                  <div class="slider-wrapper">
										<?php while ( have_rows( 'slider' ) ) : the_row(); ?>
                        <div class="slide">
													<?php $image = get_sub_field( 'image' ); ?>
													<?php if ( $image ) { ?>

                              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
													<?php } ?>
                        </div>
										<?php endwhile; ?>
                  </div>
							<?php endif; ?>

            </div>
        </div>
    </div>
</section>
