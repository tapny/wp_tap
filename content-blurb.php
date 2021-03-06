<?php
/*
  Template Name: Content Blurb on Home Page
*/

$custom_fields = get_post_custom(); 
$has_image_id = get_post_thumbnail_id();
?>

          <article class="link">
          <?php if($has_image_id): ?>
            <div class="article-img">
              <a class="article-img-thumb" href="<?php echo esc_url( get_permalink() ); ?>" <?php get_background_image_style(get_post_thumbnail_id()); ?>></a>
            </div>
           <?php endif; ?>
            <div class="article-text">
              <?php
          if ( is_single() ) :
            the_title( '<h4>', '</h4>' );
          else :
            the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
          endif;
        ?>

              <p class="text-subtitle"><?php 
              if($custom_fields['tf_events_startdate'][0])
                echo(date("F j, Y",$custom_fields['tf_events_startdate'][0]));
              else 
                the_date();
              ?></p>
              <p><?php if($has_image_id) {echo excerpt(20);} else {echo excerpt(40);} ?></p>
              <p><a href="<?php echo esc_url( get_permalink() ); ?>">Keep reading&hellip;</a></p>
            </div>
          </article>
