<?php
/**
 * Template part for displaying a General copy.
 */
?>
<section
        class="block general_copy default-<?php the_sub_field( 'default_background' ); ?> accent-<?php the_sub_field( 'accent_color' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="content">
							<?php the_sub_field( 'general_copy' ); ?>
            </div>
        </div>
    </div>
</section>