<?php
/*
  Template Name: Sidebar
*/

?>


  <section class="newsletter">
    <h4>
      <span class="label">Never miss an update</span>
      Sign up for our newsletter.
    </h4>
    <p class="description">Twice a month, we'll update you with the latest events and news about TAP-NY, and we'll never share your email with anyone else.</p>
    <form method="post" id="newsletter-form" class="newsletter-form">
      <input type="text" name="EMAIL" placeholder="Email Address" class="newsletter-form-input email">
      <input type="text" name="FNAME" placeholder="First Name" class="newsletter-form-input fname hide">
      <input type="text" name="LNAME" placeholder="Last Name" class="newsletter-form-input lname hide">
      <h5 class="hide">Subscribe to receive alerts for additional groups? (Optional)</h5>
      <div class="hide checkboxes">
        <input type="checkbox" name="vehicle" value="Bike">Sports<br>
        <input type="checkbox" name="vehicle" value="Car">Volunteer 
      </div>
      <input type="submit" value=">" name="subscribe" id="newsletter-form-submit">
    </form>
    <a href="#" class="close">Close</a>
  </section>
