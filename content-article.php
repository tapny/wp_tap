<?php $custom_fields = get_post_custom(); ?>
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
        <li style="background-image:url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'large')[0]; ?>);">
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