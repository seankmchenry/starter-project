<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Web fonts -->
<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:300,400,400i,600,600i" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico">
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class( 'basscss' ); ?>>
<div id="page" class="site">
  <a class="skip-link screen-reader-text hide" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

  <header id="masthead" class="site-header" role="banner">
    <!-- Branding -->
    <div class="site-branding">
      <h1 class="site-title m0">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </h1>
    </div><!-- .site-branding -->

    <!-- Nav -->
    <nav id="main-nav" class="main-navigation main-nav" role="navigation">
      <!-- Button -->
      <button class="menu-toggle btn btn-primary visible-xs" aria-controls="main-nav" aria-expanded="false"><?php esc_html_e( 'Menu', '_s' ); ?></button>

      <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'main-nav-menu', 'menu_class' => 'nav-menu hidden-xs' ) ); ?>
    </nav><!-- #main-nav -->
  </header><!-- #masthead -->
