<?php $custom_fields = get_post_custom(); ?>
  <h1 class="breadcrumb">
    <ul>
      <li><a href="<?php echo get_page_link(get_page_by_title('Events')->ID); ?>">Events</a></li>
      <?php 
        $event_category = get_terms("tf_eventcategory");
        if($event_category[0]): 
      ?>
      <li><a href="<?php echo get_term_link($event_category[0]); ?>"><?php echo $event_category[0]->name; ?></a></li>
      <?php endif; ?>
      <li><a><?php the_title() ?></a></li>
    </ul>
  </h1>

  <section class="hero">
    <div class="hero-slide">
      <ul>
        <li>
          <span class="hero-outer">
            <div class="hero-inner">

              <span class="article-date" href="event.html">
                <div class="article-date-inner">
                  <span class="month"><?php echo(date("M",$custom_fields['tf_events_startdate'][0])); ?></span>
                  <span class="date"><?php echo(date("j",$custom_fields['tf_events_startdate'][0])); ?></span>
                </div>
              </span>
              <h4><?php the_title() ?><br />

<?php if($custom_fields['tf_events_eventbrite'][0]): ?>
              <div class="button" href="#">Buy tickets</div>
<?php endif; ?>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="event-details">
    <div class="left">
      <a href="http://maps.google.com/?q=<?php echo trim(preg_replace('/([\\n])/', ', ', $custom_fields['tf_events_address'][0])); ?>" target="_blank">Get Directions</a>
    </div>
    <div class="right">
      <div class="inner">
      <p class="label">When</p>
      <p class="details">
        <?php echo(date('l \<\b\\r\>F j, Y \<\b\\r\>g:i a',$custom_fields['tf_events_startdate'][0])); ?>
        <?php 
        if($custom_fields['tf_events_enddate'][0]): ?>
         – 
        <?php
          echo(date('g:i a',$custom_fields['tf_events_enddate'][0])); 
        endif;
        ?>
      </p>
      <p class="label">Where</p>
      <p class="details">
        <?php echo $custom_fields['tf_events_venue'][0]; ?><br />
        <?php echo nl2br($custom_fields['tf_events_address'][0]); ?>
      </p>
    </div>
  </div>
  </section>

  <section class="event-body">
    <?php the_content() ?>
  </section>

<?php if($custom_fields['tf_events_eventbrite'][0]): ?>
  <section class="eventbrite">
    <a id="eventbrite"></a><h3>Purchase tickets now.</h3>
    <div style="width:100%; text-align:left;" ><iframe  src="https://www.eventbrite.com/tickets-external?eid=<?php echo $custom_fields['tf_events_enddate'][0]; ?>&ref=etckt" frameborder="0" height="214" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe><div style="font-family:Helvetica, Arial; font-size:10px; padding:5px 0 5px; margin:2px; width:100%; text-align:left;" ><a style="color:#ddd; text-decoration:none;" target="_blank" href="http://www.eventbrite.com/r/etckt">Sell Tickets</a> <span style="color:#ddd;">through</span> <a style="color:#ddd; text-decoration:none;" target="_blank" href="http://www.eventbrite.com?ref=etckt">Eventbrite</a></div></div>
  </section>
<?php endif; ?>