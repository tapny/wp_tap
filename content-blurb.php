<?php
/*
	Template Name: Content Blurb on Home Page
*/
?>

          <article class="link">
            <div class="article-img">
              <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="img/2.jpg" alt=""></a>
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
