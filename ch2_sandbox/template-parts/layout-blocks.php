<?php
/**
 * Template part for displaying blocks
 */
if ( have_rows( 'blocks' ) ) :
	while ( have_rows( 'blocks' ) ) : the_row();

		$layout = get_row_layout();

		get_template_part( 'template-parts/block', $layout );

	endwhile;
endif;