<?php
/**
 * Template part for displaying a Photo cards.
 */
?>
<section
        class="block photo_cards default-<?php the_sub_field( 'default_background' ); ?> accent-<?php the_sub_field( 'accent_color' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="photo_cards--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

							<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h3 class="photo_cards--title"> <?php the_sub_field( 'heading' ); ?></h3>
							<?php endif; ?>

							<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
							<?php endif; ?>

							<?php if ( have_rows( 'cards' ) ) : ?>
                  <div class="photo-cards-wrapper">
										<?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                        <div class="single-card-wrapper">
													<?php $image = get_sub_field( 'image' );
													$background  = $image['url']; ?>
                            <div class="image-wrapper" style="background-image: url('<?php echo $background; ?>');">
                                <div class="image-wrapper-inner">
                                    <!--<img src="<?php echo $background; ?>">-->
                                </div>
                            </div>
                            <div class="text-wrapper">
                                <h5><?php the_sub_field( 'heading' ); ?></h5>
															<?php the_sub_field( 'copy' ); ?>
                                <a href="<?php the_sub_field( 'link_target' ); ?>"><?php the_sub_field( 'link_text' ); ?></a>
                            </div>
                        </div>
										<?php endwhile; ?>
                  </div>
							<?php else : ?>
								<?php // no rows found ?>
							<?php endif; ?>

            </div>
        </div>
    </div>
</section>