<?php
/*
  Template Name: Sidebar
*/

?>


  <section class="newsletter">
    <div class="col-1">
      <h4>
        <span class="label">Never miss an update</span>
        Sign up for our newsletter.
      </h4>
    </div>
    <div class="col-2">
      <p class="description">Twice a month, we'll update you with the latest events and news about TAP-NY, and we'll never share your email with anyone else.</p>
    </div>
    <br />
    <div class="col-3">
      <?php
        $mailchimp_query = new WP_Query(array('page_id' => get_page_by_title('mailchimp-form')->ID));
        if ( $mailchimp_query -> have_posts() ) :
          while ( $mailchimp_query->have_posts() ) : $mailchimp_query->the_post(); 
            the_content();
          endwhile;
        else: 
          echo 'No form found!';
        endif;
      ?>
    </div>
  </section>
