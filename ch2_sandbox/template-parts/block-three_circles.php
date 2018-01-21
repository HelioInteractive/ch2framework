<?php
/**
 * Template part for displaying a Three circles.
 */
?>
<section
        class="block three_circles default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="three_circles--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

							<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h2 class="three_circles--title"> <?php the_sub_field( 'heading' ); ?></h2>
							<?php endif; ?>

							<?php if ( have_rows( 'circles' ) ) : ?>
                  <div class="circles-wrapper">
										<?php while ( have_rows( 'circles' ) ) : the_row(); ?>
                        <div class="single-circle-wrapper">
                            <a class="circle-link" href="<?php the_sub_field( 'circle_link' ); ?>">
															<?php $image = get_sub_field( 'image' ); ?>
															<?php if ( $image ) { ?>
                                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
															<?php } ?>
                                <p class="label"><?php the_sub_field( 'label' ); ?></p>
                            </a>
                        </div>
										<?php endwhile; ?>
                  </div>
							<?php else : ?>
								<?php // no rows found ?>
							<?php endif; ?>

							<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="copy">
                      <p><?php the_sub_field( 'copy' ); ?></p>
                  </div>
							<?php endif; ?>

							<?php if ( get_sub_field( 'link_text' ) ): ?>
                  <a class="button"
                     href="<?php the_sub_field( 'link_target' ); ?>"> <?php the_sub_field( 'link_text' ); ?></a>
							<?php endif; ?>

            </div>
        </div>
    </div>
</section>