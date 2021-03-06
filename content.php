<?php

$custom_fields = get_post_custom(); 
$has_image_id = get_post_thumbnail_id();

?>
  <h1>
    <?php the_title(); ?>
  </h1>
<?php if($custom_fields['sub_headline'][0]): ?>
  <section class="hero">
    <div class="hero-slide">
      <ul>
        <li <?php get_background_image_style($has_image_id);?> >
          <span class="hero-outer">
            <div class="hero-inner">
              <h4><?php echo $custom_fields['sub_headline'][0]; ?></h4>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

<?php endif; ?>
  <div class="article-body">
    <?php the_content(); ?>
  </div>