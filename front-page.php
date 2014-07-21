<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php
	// if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
	// 	// Include the featured content template.
	// 	get_template_part( 'featured-content' );
	// }
?>

  <div class="container-inner">
    <section class="events">
      <div class="full-width">
        <h2>Upcoming Events</h2>
        <div class="section-controls">
          <a class="prev" href="#">Previous</a>
          <a class="next" href="#">Next</a>
          <a class="all" href="#">View All</a>
        </div>
        <div class="section-list">

		<?php
      $args = array( 'post_type' => 'tf_events', 'posts_per_page' => 9 );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post();			
					get_template_part( 'content', 'blurb', get_post_format() );
				endwhile;
				// Previous/next post navigation.
				// twentyfourteen_paging_nav();

			else :
        ?> no posts <?php
				// If no content, include the "No posts found" template.
				// get_template_part( 'content', 'none' );

			endif;
		?>

        </div>
      </div>
    </section>



<!--     <div class="social">
      <a href="#">
        <h4>
          Like us on Facebook.
        </h4>
        <p class="description">
          You like us. You really like us.
        </p>
      </a>
    </div> -->


    <section class="articles">
      <div class="full-width">
        <h2>News &amp; Articles</h2>
        <div class="section-controls">
          <a class="prev" href="#">Previous</a>
          <a class="next" href="#">Next</a>
          <a class="all" href="#">View All</a>
        </div>
        <div class="section-list">
    <?php
      $args = array( 'post_type' => 'post', 'posts_per_page' => 9 );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post();      
          get_template_part( 'content', 'blurb', get_post_format() );
        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();

      else :
        ?> no posts <?php
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );

      endif;
		?>
        </div>
      </div>
    </section>

  </div>



<?php
get_sidebar();
get_footer();
