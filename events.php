<?php
/*
	Template Name: Events Template
*/


get_header(); ?>


  <h1>
    Events
    <ul class="categories">
      <li><a class="active" href="#">All Events</a></li>
      <li><a href="#">Professional</a></li>
      <li><a href="#">Cultural</a></li>
      <li><a href="#">Social</a></li>
      <li><a href="#">Community Service</a></li>
      <li><a href="#">Misc</a></li>
    </ul>
  </h1>


  <div class="container-inner">
    <section class="events">
    	<?
        	$event_query = new WP_Query('category_name=event&posts_per_page=5');
			if ( $event_query->have_posts() ) :
				// Start the Loop.
				while ( $event_query->have_posts() ) : $event_query->the_post();

					get_template_part( 'content', 'events', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>
      <!-- <article class="event">
        <a class="article-date" href="event.html">
          <div class="article-date-inner">
            <span class="month">Jan</span>
            <span class="date">28</span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/5.jpg);">
            <a href="event.html"></a>
          </div>
          <p class="text-subtitle">Wednesday @ 7:30pm</p>
          <h4>This is an article title</h4>
          <p>This is the description of the article. What we describe here will tell you about the contents of the article.</p>
          <p><a href="event.html">Keep reading&hellip;</a></p>
        </div>
      </article>

      <article class="event">
        <a class="article-date" href="event.html">
          <div class="article-date-inner">
            <span class="month">Jan</span>
            <span class="date">28</span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/6.jpg);">
            <a href="event.html"></a>
          </div>
          <p class="text-subtitle">Wednesday @ 7:30pm</p>
          <h4>This is an article title</h4>
          <p>This is the description of the article. What we describe here will tell you about the contents of the article.</p>
          <p><a href="event.html">Keep reading&hellip;</a></p>
        </div>
      </article>

      <article class="event">
        <a class="article-date" href="event.html">
          <div class="article-date-inner">
            <span class="month">Jan</span>
            <span class="date">28</span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/7.jpg);">
            <a href="event.html"></a>
          </div>
          <p class="text-subtitle">Wednesday @ 7:30pm</p>
          <h4>This is an article title</h4>
          <p>This is the description of the article. What we describe here will tell you about the contents of the article.</p>
          <p><a href="event.html">Keep reading&hellip;</a></p>
        </div>
      </article>

      <article class="event">
        <a class="article-date" href="event.html">
          <div class="article-date-inner">
            <span class="month">Jan</span>
            <span class="date">28</span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/1.jpg);">
            <a href="event.html"></a>
          </div>
          <p class="text-subtitle">Wednesday @ 7:30pm</p>
          <h4>This is an article title</h4>
          <p>This is the description of the article. What we describe here will tell you about the contents of the article.</p>
          <p><a href="event.html">Keep reading&hellip;</a></p>
        </div>
      </article>

      <article class="event">
        <a class="article-date" href="event.html">
          <div class="article-date-inner">
            <span class="month">Jan</span>
            <span class="date">28</span>
          </div>
        </a>
        <div class="article-text">
          <div class="article-img" style="background-image:url(img/2.jpg);">
            <a href="event.html"></a>
          </div>
          <p class="text-subtitle">Wednesday @ 7:30pm</p>
          <h4>This is an article title</h4>
          <p>This is the description of the article. What we describe here will tell you about the contents of the article.</p>
          <p><a href="event.html">Keep reading&hellip;</a></p>
        </div>
      </article> -->
    </section>
</div>


<?php /*
<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();


					get_template_part( 'content', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
*/ ?>

<?php
get_sidebar();
get_footer();

