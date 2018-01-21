
		<?php
        /**
        * Template part for displaying a Two columns.
        */
        ?>
<section
        class="block two_columns default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- extended with .row -->
            <!-- Stuff goes here -->
            <div class="two_columns--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

				<?php if ( get_sub_field( 'block_heading' ) ): ?>
					<h2 class="two_columns--title"><?php the_sub_field( 'block_heading' ); ?></h2>
				<?php endif; ?>





					<?php if ( have_rows( 'columns' ) ) : ?>
						<?php while ( have_rows( 'columns' ) ) : the_row(); ?>

						<!-- Optimize to pull from variable instead of directly to acf value in database - keep in php $colStyle = get_sub_field( 'column_style' ) -->


						<!-- 'general' (value) === (matches exactly to) this field -->
						<?php if ( 'general' === get_sub_field( 'column_style' ) ): ?><!-- If column style is text, then only display title and copy -->
							<div class="col col-sm-6 col-md-6 <?php the_sub_field( 'column_style' ); ?>"> <!-- used col-sm-6 because I couldn't extend col-md-6 from within a media query -->
								<h3><?php the_sub_field( 'column_heading_optional' ); ?></h3>
								<?php the_sub_field( 'copy' ); ?>
							</div>
						<?php endif; ?>





						<!-- 'image' (value) === (matches exactly to) this field -->
						<?php if ( 'image' === get_sub_field( 'column_style' ) ): ?><!-- If column style is image, then only display image -->
							<div class="col col-sm-6 col-md-6 <?php the_sub_field( 'column_style' ); ?>">
								<?php $image = get_sub_field( 'image' ); ?>
								<?php if ( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php } ?>
							</div>
						<?php endif; ?>







						<?php endwhile; ?>
					<?php endif; ?>

            </div>
        </div>
    </div>
</section>