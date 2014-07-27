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
      <form method="post" id="newsletter-form" class="newsletter-form">
        <input type="text" name="EMAIL" placeholder="Email Address" class="newsletter-form-input email">
        <input type="text" name="FNAME" placeholder="First Name" class="newsletter-form-input fname ">
        <input type="text" name="LNAME" placeholder="Last Name" class="newsletter-form-input lname ">
        <br />
        <input type="submit" value="Sign up" name="subscribe" id="newsletter-form-submit">
      </form>
      <a href="#" class="close">Close</a>
    </div>
  </section>
