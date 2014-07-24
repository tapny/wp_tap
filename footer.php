<?php
/*
  Template Name: Footer
*/
?>


</div> <!-- /container -->
  <footer>
    <h1><a href="#">TAP-NY | Taiwanese American Professionals - New York</a></h1>
    <p class="description">
      &copy; 2014 TAP-NY. All rights reserved.
      A 501(c)(3) organization for the Taiwanese American community in the NYC area.<br /> 
      <a href="#">Privacy Policy</a> <a href="#">Terms &amp; Conditions</a>
    </p>

<?php
    $footermenu = array (
      'theme_location' => 'tapny_footer_menu',
      'container' => '',
      'menu_class' => 'nav',
    );
    wp_nav_menu( $footermenu );


    $socialmenu = array (
      'theme_location' => 'tapny_social_menu',
      'container' => '',
      'menu_class' => 'social-links',
    );
    wp_nav_menu( $socialmenu );
?>
  </footer>


  <?php wp_footer(); ?>

</body>
</html>