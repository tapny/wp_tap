<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>



<?

  $post = $wp_query->post;
  if (in_category('event')) {


      require('single_event.php');
  // } elseif (in_category('news')) {
  //     include(TEMPLATEPATH.'/single_news.php');
  // } elseif(in_category('wordpress')) {
  //     include(TEMPLATEPATH.'/single_wordpress.php');
  }
  else{ ?>

LKJFLKAJFLK JALKFJ LKASJ FLKAJS FLKJAS LKF JALF
<?
  }
?>

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
