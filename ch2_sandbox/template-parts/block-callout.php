<?php
/**
 * Template part for displaying a callout.
 */
?>
<section
    class="block callout default-<?php the_sub_field( 'default_background' ); ?> style-<?php the_sub_field( 'style' ); ?>"
    <?php if ( get_sub_field( 'image' ) ) { ?>
	    style="background-image: url('<?php echo $background; ?>');"
	<?php } ?>
>    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="callout--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

							<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h3 class="callout--title"> <?php the_sub_field( 'heading' ); ?></h3>
							<?php endif; ?>

							<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
							<?php endif; ?>

							<?php if ( get_sub_field( 'button_link' ) ): ?>
                  <a class="btn-default-o"
                     href="<?php the_sub_field( 'button_link' ); ?>"> <?php the_sub_field( 'button_text' ); ?></a>
							<?php endif; ?>

            </div>
        </div>
    </div>
</section>