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
    <div class="outer-block-wrapper">
        <div class="inner-block-wrapper">

			<?php if ( get_field( 'main_address', 'option' ) ): ?>
              <address>
				<?php the_field( 'main_address', 'option' ); ?>
              </address>
			<?php endif; ?>

            <nav id="footer-navigation" class="footer-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'footer-menu' ) ); ?>
            </nav><!-- #site-navigation -->
            <div class="site-info">
                &copy;<?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
                <span class="sep"> | </span>All Rights Reserved<span class="sep"> | </span><a
                        href="/privacy-policy/">Privacy Policy</a>
            </div><!-- .site-info -->
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php
$actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ( devTime() ) :?>
    <a style="background: grey; position: fixed; bottom: 0; right: 0;"
       target='_blank' href="/wp-content/themes/ch2_sandbox/inc/block-maker.php">Block maker</a>

	<?php
endif;

?>
</body>
</html>
