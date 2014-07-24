<?php
/*
	Template Name: Content Blurb on Home Page
*/
?>

          <article class="link">
            <div class="article-img" style="background-image:url(img/2.jpg)">
              <a href="<?php echo esc_url( get_permalink() ); ?>"></a>
            </div>
            <div class="article-text">
              <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
              <p class="text-subtitle"><?php the_date(); ?></p>
              <p><?php the_excerpt(); ?></p>
              <p><a href="<?php echo esc_url( get_permalink() ); ?>">Keep reading&hellip;</a></p>
            </div>
          </article>
