<?php
/*
  Template Name: Header
*/
?>
<!DOCTYPE html>
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
	<title><?php if (is_front_page()){ bloginfo('name'); echo " - "; bloginfo('description'); } else { wp_title(''); echo " - "; bloginfo('name'); } ?></title>
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

    $secondarymenu = array (
      'theme_location' => 'tapny_secondary_menu',
      'container' => '',
      'menu_class' => 'nav-secondary',
    );
    wp_nav_menu( $secondarymenu );
	?>


  </nav>
  </div>

<div id="container">
