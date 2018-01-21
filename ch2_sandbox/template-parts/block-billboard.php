<?php
/**
 * Template part for displaying a Billboard.
 *

 */
$background_image = get_sub_field( 'background_image' );
$background       = $background_image['url']; ?>
<section
        class="block billboard style-<?php the_sub_field( 'style' ); ?>"
        style="background-image: url('<?php echo $background; ?>'); background-position: <?php the_sub_field( 'focus' ); ?>;">
	<?php if ( get_sub_field( 'style' ) == '3' ): ?>
      <div class="filter"></div>
	<?php endif; ?>

    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here-->

			<?php if ( ( get_sub_field( 'style' ) == '1' ) || ( get_sub_field( 'style' ) == '2' ) ): ?>
				<?php if ( get_sub_field( 'heading' ) ): ?>
					<?php if ( is_front_page() ) : ?>
						<div class="billboard--title"><h2><?php the_sub_field( 'heading' ); ?></h2></div>
					<?php else : ?>
						<div class="billboard--title"><h1><?php the_sub_field( 'heading' ); ?></h1></div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>

            <div class="billboard--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->
				<?php if ( get_sub_field( 'style' ) == '3' ): ?>
					<?php if ( is_front_page() ) : ?>
						<h2 class="billboard--title"> <?php the_sub_field( 'heading' ); ?></h2>
					<?php else : ?>
						<h1 class="billboard--title"> <?php the_sub_field( 'heading' ); ?></h1>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( get_sub_field( 'style' ) == '1' ): ?>
					<?php if ( get_sub_field( 'quote_text' ) ): ?>
                    <div class="quote">
                    	<blockquote><?php the_sub_field( 'quote_text' ); ?></blockquote>
                        <!-- ヾ(＾∇＾) Not what the blockquote element is used for. ¯\_(ツ)_/¯-->
                    </div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( get_sub_field( 'copy' ) ): ?>
                	<div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
				<?php endif; ?>

				<?php if ( get_sub_field( 'button_link' ) ): ?>
                	<a class="button" href="<?php the_sub_field( 'button_link' ); ?>"> <?php the_sub_field( 'button_text' ); ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>