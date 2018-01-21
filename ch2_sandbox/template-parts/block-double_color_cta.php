<?php
/**
 * Template part for displaying a Double color cta.
 */

wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight-min.js', array( jquery ), '', false );
?>
<section class="block double_color_cta">


    <div class=" outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->

					<?php if ( have_rows( 'cta_blocks' ) ) : ?>

              <!-- Stuff goes here -->

						<?php while ( have_rows( 'cta_blocks' ) ) :
							the_row(); ?>
							<?php $background_image = get_sub_field( 'background_image' ); ?>
                  <div class="cta-wrap">
                      <div class="cta-image" style="background-image: url('<?php echo $background_image['url']; ?>');">

                      </div>
                      <div class="cta-block">

                          <h2><?php the_sub_field( 'cta_heading' ); ?></h2>
                          <a class='button'
                             href="<?php the_sub_field( 'button_link' ); ?>"><?php the_sub_field( 'button_text' ); ?></a>
                          <div class="cta-content">
														<?php the_sub_field( 'content' ); ?>
                          </div>
                      </div>
                  </div>
						<?php endwhile; ?>
					<?php endif; ?>
        </div>
    </div>
</section>
<script>
    jQuery(function () {
        jQuery('.double_color_cta .cta-content').matchHeight(
            {
                property: 'height',
            });
    });
</script>