<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ch2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
			<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php ch2_posted_on(); ?>
					</div><!-- .entry-meta -->
					<?php
				endif; ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
        	<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<?php the_excerpt(); ?>
        	</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
