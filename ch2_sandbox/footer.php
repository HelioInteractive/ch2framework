<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Helio_Blueprint
 */

?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info col col-md-12">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'helio-blueprint' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'helio-blueprint' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'helio-blueprint' ), 'helio-blueprint', '<a href="https://automattic.com/" rel="designer">Helio Interactive</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
