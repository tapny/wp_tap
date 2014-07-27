<?php
/*
  Template Name: Events Template
*/

get_header(); 
?>


  <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          get_template_part( 'content', get_post_format() );
        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();
      else :
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );
      endif;
    ?>

  <div id="board-bios" class="boxes three-up">

<?php
$args = array(
	'role' => 'Contributor'
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->results ) ) {
	foreach ( $user_query->results as $user ) { ?>
    <div class="box">
      <div class="box-content" style="background-image:url(<?php echo get_avatar_url(get_avatar($user->ID,512)); ?>);">
        <div class="box-content-inner">
          <h4><?php echo $user->display_name ?></h4>
          <p class="text-subtitle"><?php echo $user->title ?></p>
        </div>
      </div>
      <div class="box-hidden">
        <h4><?php echo $user->display_name ?></h4>
        <p class="text-subtitle"><?php echo $user->title ?></p>
        <p><?php echo nl2br($user->description) ?></p>
      </div>
    </div>
<?php	}
} else {
	echo 'No users found.';
}
?>

  </div>

<?php
get_sidebar();
get_footer();
