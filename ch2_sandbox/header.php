<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ch2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--hello? -->
<script>
    document.body.classList.add('js');
</script>
<div id="page" class="site">

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ch2_sandbox' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="outer-block-wrapper">
            <div class="inner-block-wrapper">
                <div class="site-branding">
                    
					<?php $site_logo = get_field( 'site_logo', 'option' ); ?>
					<?php if ( $site_logo ) { ?>
                    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $site_logo['url']; ?>" alt="<?php echo $site_logo['alt']; ?>"/></a>
					<?php } else { ?>
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php } ?>
                </div><!-- .site-branding -->
                <div class="button-box">

                    <div class="search-box not-toggled"><?php get_search_form(); ?>
                        <button class="search-toggle"></button>
                    </div>

                </div>

                <nav id="site-navigation" class=" main-navigation" role="navigation">
                    <div class="menu-toggle" aria-controls="primary-menu"
                            aria-expanded="false">
                        <div class="fancy-burger"><span></span></div>
                    </div>
									<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            </div>

    </header><!-- #masthead -->

    <div id="content" class="site-content">
