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
			<section class="block hero height-<?php the_field( 'height' ); ?>" style="background-color: gray; background-image: url('<?php echo $background; ?>');">
    
			    <div class="filter"></div>
			
			    <div class="outer-block-wrapper">
			        <div class="inner-block-wrapper">
			
			            <div class="hero--content">
			
							<?php if ( get_field( 'heading', get_option('page_for_posts', true) ) ) { ?>
								<h1 class="hero--title"><?php the_field( 'heading', get_option('page_for_posts', true) ); ?></h1>
							<?php } else { ?>
								<h1 class="hero--title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
							<?php } ?>
							
							<?php if ( get_field( 'copy', get_option('page_for_posts', true) ) ): ?>
			                	<div class="copy"> <?php the_field( 'copy', get_option('page_for_posts', true) ); ?></div>
							<?php endif; ?>
			
							<?php if ( get_field( 'button_link', get_option('page_for_posts', true) ) ): ?>
			                	<a class="btn-default" href="<?php the_field( 'button_link', get_option('page_for_posts', true) ); ?>"> <?php the_field( 'button_text', get_option('page_for_posts', true) ); ?></a>
							<?php endif; ?>
							
			            </div>
			        </div>
			    </div>
			    
			</section>

			<section class="block posts-container">
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
			</section>
			
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
