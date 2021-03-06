<?php
/**
 * Template part for displaying a Billboard.
 *
 * TODO: use this for archive.php, home.php, content-single.php and archive-team_member.php - each of those has own variations
 */
$background = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
<section class="block hero height-<?php the_field( 'height' ); ?>" style="background-color: gray; background-image: url('<?php echo $background; ?>');">
    
    <div class="filter"></div>

    <div class="outer-block-wrapper">
        <div class="inner-block-wrapper">

            <div class="hero--content">

				<?php if ( get_field( 'heading' ) ) { ?>
					<h1 class="hero--title"> <?php the_field( 'heading' ); ?></h1>
				<?php } else { ?>
					<h1 class="hero--title"> <?php the_title(); ?></h1>
				<?php } ?>
				
				<?php if ( get_field( 'copy' ) ): ?>
                	<div class="copy"> <?php the_field( 'copy' ); ?></div>
				<?php endif; ?>

				<?php if ( get_field( 'button_link' ) ): ?>
                	<a class="btn-default" href="<?php the_field( 'button_link' ); ?>"> <?php the_field( 'button_text' ); ?></a>
				<?php endif; ?>
				
            </div>
        </div>
    </div>
    
</section>