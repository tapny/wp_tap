<?php
/*
	Template Name: Content Events Blurb on Events Page
*/
$custom_fields = get_post_custom(); 
?>

      <article class="event">
        <a class="article-date" href="<?php echo esc_url( get_permalink() ); ?>">
          <div class="article-date-inner">
            <span class="month"><?php echo(date("M",$custom_fields['tf_events_startdate'][0])); ?></span>
            <span class="date"><?php echo(date("j",$custom_fields['tf_events_startdate'][0])); ?></span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/6.jpg);">
            <a href="<?php echo esc_url( get_permalink() ); ?>"></a>
          </div>
          <p class="text-subtitle"><?php echo(date('l @ g:i a',$custom_fields['tf_events_startdate'][0])); ?></p>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
          <p><a href="<?php echo esc_url( get_permalink() ); ?>">Keep reading&hellip;</a></p>
        </div>
      </article>


