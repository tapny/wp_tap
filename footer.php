<?php
/*
  Template Name: Footer
*/
?>


</div> <!-- /container -->
  <footer>
  <div class="col-1">
    <h1><a href="#">TAP-NY | Taiwanese American Professionals - New York</a></h1>
  </div>
  <div class="col-2">
    <p class="description">
      &copy; 2014 TAP-NY. All rights reserved.
      A 501(c)(3) organization for the Taiwanese American community in the NYC area.<br /> 
      <a href="#">Privacy Policy</a> <a href="#">Terms &amp; Conditions</a>
    </p>
  </div>
  <div class="col-3">
<?php
    $footermenu = array (
      'theme_location' => 'tapny_footer_menu',
      'container' => '',
      'menu_class' => 'nav',
    );
    wp_nav_menu( $footermenu );
?>
  </div>
  <div class="col-4">
<?php

    $socialmenu = array (
      'theme_location' => 'tapny_social_menu',
      'container' => '',
      'menu_class' => 'social-links',
    );
    wp_nav_menu( $socialmenu );
?>
  </div>
  </footer>


  <?php wp_footer(); ?>

</body>
</html>