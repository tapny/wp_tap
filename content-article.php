<?php 

$custom_fields = get_post_custom(); 

?>
  <h1 class="breadcrumb">
    <ul>
      <li><a href="<?php echo get_page_link(get_page_by_title('Articles')->ID); ?>">Articles</a></li>
      <?php 
        $category = get_the_category();
        if($category[0]): 
      ?>
      <li><a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->name; ?></a></li>
      <?php endif; ?>
      <li><a><?php the_title() ?></a></li>
    </ul>
  </h1>
  <section class="hero">
    <div class="hero-slide">
      <ul>
        <li <?php get_background_image_style(get_post_thumbnail_id()); ?>>
          <?php if($custom_fields['featured_blur'][0]): ?>
          <div class="hero-bgimage" <?php get_background_image_style(get_post_thumbnail_id()); ?>></div>
          <?php endif; ?>
          <span class="hero-outer">
            <div class="hero-inner">
              <h4><?php the_title() ?></h4>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <div class="article-body">
    <?php the_content(); ?>
  </div>