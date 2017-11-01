<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ch2
 */

?>
	</div><!-- #content -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ch2_sandbox' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ch2_sandbox' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ch2_sandbox' ), 'ch2_sandbox', '<a href="https://automattic.com/" rel="designer">Helio Interactive</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php
$actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ( strpos( $actual_link, '.dev' ) !== false ) :?>
  <a style="background: grey; position: fixed; bottom: 0; left: 50%;"href="/wp-content/themes/ch2_sandbox/inc/block-maker.php">Block maker</a>

<?php
    endif;

?>

</body>
</html>
