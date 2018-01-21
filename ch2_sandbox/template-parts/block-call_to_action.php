<?php
/**
 * Template part for displaying a Call to action.
 */
?>
<section
        class="block call_to_action default-<?php the_sub_field( 'default_background' ); ?>  style-<?php the_sub_field( 'style' ); ?> ">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="call_to_action--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

							<?php if ( get_sub_field( 'heading' ) ): ?>
                  <h3 class="call_to_action--title"> <?php the_sub_field( 'heading' ); ?></h3>
							<?php endif; ?>

							<?php if ( get_sub_field( 'copy' ) ): ?>
                  <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
							<?php endif; ?>

							<?php if ( get_sub_field( 'button_link' ) ): ?>
                  <a class="button"
                     href="<?php the_sub_field( 'button_link' ); ?>"> <?php the_sub_field( 'button_text' ); ?></a>
							<?php endif; ?>

            </div>
        </div>
    </div>
</section>