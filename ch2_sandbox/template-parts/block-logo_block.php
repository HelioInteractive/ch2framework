<?php
/**
 * Template part for displaying a Logo block.
 */
?>
<section
        class="block logo_block default-<?php the_sub_field( 'default_background' ); ?> accent-<?php the_sub_field( 'accent_color' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="logo_block--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

				<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h3 class="logo_block--title"> <?php the_sub_field( 'heading' ); ?></h3>
				<?php endif; ?>

				<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
				<?php endif; ?>


				<?php if ( have_rows( 'logos' ) ) : ?>
					<?php $counter = 0 ?>
					<?php while ( have_rows( 'logos' ) ) : the_row(); ?>
						<?php $counter ++; ?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if ( have_rows( 'logos' ) ) : ?>
                	<div class="logos-wrapper num-<?php echo $counter; ?>">
					<?php while ( have_rows( 'logos' ) ) : the_row(); ?>
                		<div class="image-wrapper ">
	                		<?php if ( get_sub_field( 'link_target' ) ) : ?>
                            <a href="<?php the_sub_field( 'link_target' ); ?>">
	                        <?php endif; ?>
								<?php $logo = get_sub_field( 'logo' ); ?>
								<?php if ( $logo ) { ?>
                                  <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
								<?php } ?>
							<?php if ( get_sub_field( 'link_target' ) ) : ?>
                            </a>
                            <?php endif; ?>
                        </div>
						<?php endwhile; ?>
                  </div>
				<?php endif; ?>

            </div>
        </div>
    </div>
</section>