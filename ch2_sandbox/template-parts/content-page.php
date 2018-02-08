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
	<header class="entry-header block billboard" style="background-color: gray; background-image: url('<?php echo $background; ?>');">
		<div class="filter"></div>
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
			<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<div class="billboard--content">
					<?php the_title( '<h1 class="billboard--title entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<section class="block general_copy">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
        	<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				
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
	</section><!-- .entry-content -->

	<?php get_template_part( 'template-parts/layout', 'blocks' ); ?>
	
	<footer class="entry-footer">
		<div class="outer-block-wrapper"> <!-- extend with needed container -->
        	<div class="inner-block-wrapper"> <!-- probably extend with row or -->
				<?php ch2_entry_footer(); ?>
        	</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
