<?php
/**
 * Template part for displaying a Billboard.
 *

 */
$background_image = get_sub_field( 'background_image' );
$background       = $background_image['url']; ?>
<section class="block billboard" style="background-image: url('<?php echo $background; ?>'); background-position: <?php the_sub_field( 'focus' ); ?>;">
    
    <div class="filter"></div>

    <div class="outer-block-wrapper">
        <div class="inner-block-wrapper">

            <div class="billboard--content">

				<h1 class="billboard--title"> <?php the_sub_field( 'heading' ); ?></h1>

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