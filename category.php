<?php
/*
  Template Name: Events Template
*/

get_header(); 

$is_article_page = $post->ID == get_page_by_title('Articles')->ID;

//List categories
$orderby      = 'count'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 0;      // 1 for yes, 0 for no
$title        = '';
$args = array(
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
);

?>


  <h1>
    Articles
    <ul class="categories">
      <li <?php if($is_article_page): ?>class="current-cat"<?php endif; ?>><a href="<?php echo get_page_link(get_page_by_title('Articles')->ID); ?>">All Categories</a></li>
      <?php wp_list_categories( $args ); ?>
    </ul>
  </h1>


  <div class="container-inner">
    <section class="articles">
      <div class="left">
        <div class="section-page">

    <?
      if ($is_article_page) {
        $article_query = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => '10',
          'paged' => get_query_var('paged')
        ));
        if ( $article_query->have_posts() ) {
          while ( $article_query->have_posts() ) : $article_query->the_post();
            get_template_part( 'content', 'posts', get_post_format() );
          endwhile;
          wpex_pagination();
        }  
      }
      elseif ( have_posts() ) {
        while ( have_posts() ) : the_post();
          get_template_part( 'content', 'posts', get_post_format() );
        endwhile;
        // Previous/next post navigation.
        // twentyfourteen_paging_nav();
      }
      else {
        // If no content, include the "No posts found" template.
        // get_template_part( 'content', 'none' );
      }
    ?>

        </div>
      </div>
      <div class="right">
        <div class="section-sidebar">
          <ul class="sidebar-tabs">
            <li class="active"><a href="#">Recommended</a></li>
            <li><a href="#">Random</a></li>
          </ul>
          <ol class="sidebar-list recommended toggle active">
          <?php 
            $recommended_query = new WP_Query(array(
              'post_type' => 'post',
              'limit' => '10',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_key' => 'featured_rank',
              'meta_query' => array(
                    array(
                      'key' => 'featured_rec',
                      'value' => true
                    ),
                    array(
                      'key' => 'featured_rank',
                      'compare' => 'EXISTS'
                    )
              )
            ));
            if ( $recommended_query->have_posts() ) :
              while ( $recommended_query->have_posts() ) : $recommended_query->the_post();
                ?>
                  <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></li>
                <?php
              endwhile;
            endif;  
          ?>
          </ol>
          <ol class="sidebar-list random toggle">
          <?php 
            $recommended_query = new WP_Query(array(
              'post_type' => 'post',
              'cat' => get_query_var('cat'),
              'orderby' => 'rand',
              'limit' => '10'
            ));
            if ( $recommended_query->have_posts() ) :
              while ( $recommended_query->have_posts() ) : $recommended_query->the_post();
                ?>
                  <li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></li>
                <?php
              endwhile;
            endif;  
          ?>
          </ol>
        </div>
      </div>
    </section>



<?php
get_sidebar();
get_footer();
