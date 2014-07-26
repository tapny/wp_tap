<?php
/*
	Template Name: Content Blurb on Home Page
*/

  $has_image_id = get_post_thumbnail_id();
?>

          <article class="link">
            <div class="article-img" style="background-image:url(<?php 
            if($has_image_id){
              echo wp_get_attachment_image_src($has_image_id,'small')[0].')"'; 
            } else {
              echo get_template_directory_uri().'/img/article.png); background-size:contain;"';
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
