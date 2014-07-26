<?php
/*
	Template Name: Content Blurb on Home Page
*/
?>

          <article class="link">
            <div class="article-img">
              <a class="article-img-thumb" href="<?php echo esc_url( get_permalink() ); ?>" style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'small')[0]; ?>);"></a>
            </div>
            <div class="article-text">
            	<?php
					if ( is_single() ) :
						the_title( '<h4>', '</h4>' );
					else :
						the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
					endif;
				?>

              <p class="text-subtitle">February 15, 2014</p>
              <p><?php the_excerpt(); ?></p>
              <p><a href="<?php echo esc_url( get_permalink() ); ?>">Keep reading&hellip;</a></p>
            </div>
          </article>
