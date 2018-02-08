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
	<?php $background = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
	<header class="entry-header block hero" style="background-color: gray; background-image: url('<?php echo $background; ?>');">
		<div class="filter"></div>
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
			<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<div class="hero--content">
					<?php the_title( '<h1 class="hero--title entry-title">', '</h1>' ); 
					?>
					<?php if ( 'post' === get_post_type() ) : ?>
						<div class="copy entry-meta">
							<p><?php ch2_posted_on(); ?></p>
						</div><!-- .entry-meta -->
						<?php
					endif; ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="block entry-content">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
        	<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				
				<div class="widget">
					<h4 class="widget-title">Share</h4>
					<div class="addthis_inline_share_toolbox"></div>
				</div>
				
				<div class="content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ch2_sandbox' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
				</div>
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
