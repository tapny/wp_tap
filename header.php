<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage wp_tap
 * @since TAP-NY
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body>
  <div id="hamburger" class="<?php if ( is_front_page() ): ?>home<?php endif; ?> top">
    <a class="burger" href="#">Menu</a>
    <h1><a href="<?php bloginfo('url') ?>"><span>TAP-NY | Taiwanese American Professionals - New York</span></a></h1>
  </div>
  <div class="nav-wrapper">
  <nav>
    <h1><a href="<?php bloginfo('url') ?>"><span>TAP-NY | Taiwanese American Professionals - New York</span></a></h1>

    <a href="#" class="close">Close</a>

	<?php 

		$primarymenu = array (
			'theme_location' => 'tapny_primary_menu',
			'container' => '',
			'menu_class' => 'nav-primary',
			'fallback_cb' => false,
			'walker' => new T5_Nav_Menu_Walker_Simple
		);
		wp_nav_menu( $primarymenu ); 

	?>

<!--     <ul class="nav-primary">
      <li>
        <span>About</span>
        <a class="about" data-name="About" href="#">About</a></li>
      <li>
        <span>Articles</span>
        <a class="articles" data-name="Articles" href="#">Articles</a></li>
      <li>
        <span>Events</span>
        <a class="events" data-name="Events" href="#">Events</a></li>
    </ul> -->

    <ul class="nav-secondary">
      <li><a href="default.html">Careers</a></li>
      <li><a href="default.html">Newsletter</a></li>
      <li><a href="default.html">Get Involved</a></li>
      <li><a href="default.html">Sponsors + Donors</a></li>
      <li><a href="default.html">Contact Us</a></li>
    </ul>
  </nav>
  </div>

<div id="container">
