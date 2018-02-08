<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ch2
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			$background = get_the_post_thumbnail_url( get_option('page_for_posts', true), 'full' );
			?>
			<header class="page-header block hero height-<?php the_field( 'height', get_option('page_for_posts', true) ); ?>" style="background-color: gray; background-image: url('<?php echo $background; ?>');">
				<div class="filter"></div>
				<div class="outer-block-wrapper"> <!-- extend with needed container -->
					<div class="inner-block-wrapper"> <!-- probably extend with row or -->
						<?php if ( get_field( 'heading', get_option('page_for_posts', true) ) ) { ?>
							<h1 class="hero--title"><?php the_field( 'heading', get_option('page_for_posts', true) ); ?></h1>
						<?php } else { ?>
							<h1 class="hero--title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
						<?php } ?>
							
						<?php the_archive_title( '<p class="">', '</p>' ); ?>
					</div>
				</div>
			</header><!-- .page-header -->

			<div class="block posts-container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;
			?>
			</div>
			
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
