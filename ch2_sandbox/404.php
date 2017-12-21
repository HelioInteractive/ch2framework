<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ch2
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="outer-wrapper">
					<div class="inner-wrapper">
						<div class="content-wrapper">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ch2_sandbox' ); ?></h1>
							</header><!-- .page-header -->
			
							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ch2_sandbox' ); ?></p>
			
								<?php
								//	get_search_form();
			
								//	the_widget( 'WP_Widget_Recent_Posts' );
			
									// Only show the widget if site has multiple categories.
			
									/* translators: %1$s: smiley */
			
								?>
			
							</div><!-- .page-content -->
						</div>
					</div>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
