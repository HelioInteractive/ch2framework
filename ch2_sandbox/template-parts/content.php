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
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
		
				if ( 'post' === get_post_type() ) : ?>
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
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ch2_sandbox' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
        	</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
        	<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<?php ch2_entry_footer(); ?>
        	</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
