<?php
/*
	Template Name: Content Blurb on Home Page
*/

  $has_image_id = get_post_thumbnail_id();
?>

          <article class="link">
            <div class="article-img" <?php 
            if($has_image_id){
              get_background_image_style($has_image_id);
            } else {
              echo 'style="background-image:url('.get_template_directory_uri().'/img/article.png); background-size:contain;"';
            }
            ?>>
              <a href="<?php echo esc_url( get_permalink() ); ?>"></a>
            </div>
            <div class="article-text">
              <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
              <p class="text-subtitle"><?php the_date(); ?></p>
              <p><?php the_excerpt(); ?></p>
              <p><a href="<?php echo esc_url( get_permalink() ); ?>">Keep reading&hellip;</a></p>
            </div>
          </article>
