<?php
/*
  Template Name: Index
*/

get_header(); ?>




  <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          get_template_part( 'content', get_post_format() );
          print_r($post);
          print_r(get_post_custom());
        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();
      else :
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );
      endif;
    ?>

  




<?php
get_sidebar();
get_footer();
