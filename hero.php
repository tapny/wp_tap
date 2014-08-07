<?php 

      $args = array(
              'post_type' => array( 'post', 'tf_events', 'page' ),
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_key' => 'featured_rank',
              'meta_query' => array(
                    array(
                      'key' => 'featured_slide',
                      'value' => true
                    ),
                    array(
                      'key' => 'featured_rank',
                      'compare' => 'EXISTS'
                    )
              )
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) : 
      ?>
      <section class="hero tall">
      <?php if($loop->found_posts>1): ?>
        <div class="progress"><div class="inner"></div></div>
        <div class="hero-slide">
          <a class="prev" href="#">Next</a>
          <a class="next" href="#">Prev</a>
      <?php else: ?>
        <div>
      <?php endif; ?>
          <ul> 
      <?php
        while ( $loop->have_posts() ) : $loop->the_post();    
      ?>   
                <li class="slideshow-<?php echo $loop->current_post; ?>" <?php get_background_image_style(get_post_thumbnail_id()); ?> >

                  <?php 
                  $custom_array = get_post_custom();
                  if($custom_array && $custom_array['featured_blur'][0]): 
                  ?>
                  <div class="hero-bgimage" <?php get_background_image_style(get_post_thumbnail_id()); ?>></div>
                  <?php endif; ?>
                  <a class="hero-outer" href="<?php echo get_permalink(); ?>">
                    <div class="hero-inner">
                      <h3><?php 
                      $custom_array = get_post_custom();
                      if($custom_array && is_array($custom_array["sub_headline"]))
                        echo $custom_array['sub_headline'][0];
                      else
                        the_title();
                      ?></h3>
                      <br /><br />
                      <div class="button" href="<?php echo get_permalink(); ?>">Read more</div>
                    </div>
                  </a>
                </li>      
        <?php
        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();
      ?>
          </ul>
        </div>
      </section>
      <?php
      else :
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );
      endif;
?>
