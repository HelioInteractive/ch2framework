
		<?php
        /**
        * Template part for displaying a Text and icons.
        */
        ?>
<section 
	class="block text_and_icons default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="text_and_icons--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

				<?php if ( get_sub_field( 'heading' ) ): ?>
                    <h3 class="text_and_icons--title"> <?php the_sub_field( 'heading' ); ?></h3>
				<?php endif; ?>

				<?php if ( get_sub_field( 'copy' ) ): ?>
                    <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
				<?php endif; ?>
				
				<?php if ( have_rows( 'icons' ) ) : ?>
					<div class="icons-wrapper">
						<?php while ( have_rows( 'icons' ) ) : the_row(); ?>
							<div class="icons-text-wrapper">
								<?php $image = get_sub_field( 'image' ); ?>
								<?php if ( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php } ?>
								<h3><?php the_sub_field( 'icon_label' ); ?></h3>
								<?php if ( get_sub_field( 'icon_text' ) ): ?>
									<p class="small"><?php the_sub_field( 'icon_text' ); ?><br>
								<?php endif; ?>
								<?php if ( get_sub_field( 'link' ) ): ?>
									<a href="<?php the_sub_field( 'link' ); ?>">Read more</a></p>
								<?php endif; ?>
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