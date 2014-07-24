<?php
/*
  Template Name: Events Template
*/

get_header(); 


$orderby      = 'count'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 0;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);

?>


  <h1>
    Articles
    <ul class="categories">
      <li><a href="<?php get_post_type_archive_link('tf_events'); ?>">All Categories</a></li>
      <?php wp_list_categories( $args ); ?>
    </ul>
  </h1>


  <div class="container-inner">
    <section class="articles">
      <div class="left">
        <div class="section-page">

    <?
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();

          get_template_part( 'content', 'posts', get_post_format() );

        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();

      else :
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );

      endif;
    ?>


          <a class="more" href="#">Pagination goes here.</a>
        </div>
      </div>
      <div class="right">
        <div class="section-sidebar">
          <ul class="sidebar-tabs">
            <li><a class="active" href="#">Recommended</a></li>
            <li><a href="#">Popular</a></li>
          </ul>
          <ol class="sidebar-list recommended toggle active">
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
          </ol>
          <ol class="sidebar-list popular toggle">
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
            <li><a href="#">Article name here</a></li>
          </ol>
        </div>
      </div>
    </section>
