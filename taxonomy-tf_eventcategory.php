<?php
/*
	Template Name: Events Template
*/


get_header(); 


$taxonomy     = 'tf_eventcategory';
$orderby      = 'count'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 0;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
);

?>


  <h1>
    Events
    <ul class="categories">
      <li><a href="<?php get_post_type_archive_link('tf_events'); ?>">All Categories</a></li>
      <?php wp_list_categories( $args ); ?>
    </ul>
  </h1>


  <div class="container-inner">
    <section class="events events-page">
    	<?
      $event_query = new WP_Query(array(
        'post_type' => 'tf_events'
      ));
			if ( $event_query->have_posts() ) :
				// Start the Loop.
				while ( $event_query->have_posts() ) : $event_query->the_post();

					get_template_part( 'content', 'events', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				// twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				// get_template_part( 'content', 'none' );

			endif;
		?>
    </section>
</div>




<?php
get_sidebar();
get_footer();

