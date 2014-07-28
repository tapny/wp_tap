<?php
/**
 * TAP-NY functions and definitions
 */
add_theme_support( 'post-thumbnails' ); 
function create_custom_menus() {
  register_nav_menus(array(
	'tapny_primary_menu' => __( 'Big buttons shown in primary menu'),
	'tapny_secondary_menu' => __( 'Secondary menu that is hidden until revealed'),
	'tapny_footer_menu' => __( 'Items available in the footer'),
    'tapny_social_menu' => __( 'Social available in the footer')
  ));
}
add_action( 'init', 'create_custom_menus' );

/**
 * Enqueue scripts and styles for the front end.
 */
function tapny_scripts() {
	// Load our main stylesheet.
	wp_enqueue_style( 'tapny-style', get_stylesheet_uri());

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {}
	if ( is_singular() && wp_attachment_is_image() ) {}
	if ( is_active_sidebar( 'sidebar-3' ) ) {}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tapny-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'tapny_scripts' );

// Filter function
function add_contact_fields($profile_fields) {
    // Adding fields
    $profile_fields['title'] = 'Title';
    return $profile_fields;
}
// Adding the filter
add_filter('user_contactmethods', 'add_contact_fields');

function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}
function get_thumbnail_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches;
}

add_image_size( 'blurbthumb1', 276, 100, true );
add_image_size( 'blurbthumb2', 100, 100, true );

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');


function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

function get_background_image_style($thumbnail_id) {
    $image_src = wp_get_attachment_image_src($thumbnail_id, 'full');
    if ( is_array($image_src) ):
        echo 'style="background-image: url('.$image_src[0].');"';
    endif;
}

/* ------------------- THEME FORCE ---------------------- */

/*
 * EVENTS FUNCTION (CUSTOM POST TYPE) - GPL & all that good stuff obviously...
 *
 * If you intend to use this, please:
 * -- Amend your paths (CSS, JS, Images, etc.)
 * -- Rename functions, unless you're down with the force ;)
 *
 * This is not a plug-in on purpose, it's meant to be it's on file within your theme.
 * http://www.noeltock.com/web-design/wordpress/custom-post-types-events-pt1/
 */


// 0. Base

add_action('admin_init', 'tf_functions_css');

function tf_functions_css() {
	wp_enqueue_style('tf-functions-css', get_bloginfo('template_directory') . '/style/vendor/tf-functions.css');
}

// 1. Custom Post Type Registration (Events)

add_action( 'init', 'create_event_postype' );

function create_event_postype() {

$labels = array(
    'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'events'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Event'),
    'new_item' => __('New Event'),
    'view_item' => __('View Event'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No events found'),
    'not_found_in_trash' => __('No events found in Trash'),
    'parent_item_colon' => '',
);

$args = array(
    'label' => __('Events'),
    'labels' => $labels,
    'public' => true,
    'can_export' => true,
    'show_ui' => true,
    '_builtin' => false,
    '_edit_link' => 'post.php?post=%d', // ?
    'capability_type' => 'post',
    'hierarchical' => false,
    'rewrite' => array( "slug" => "events" ),
    'supports'=> array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes') ,
    'show_in_nav_menus' => true,
    'taxonomies' => array('post_tag','tf_eventcategory'),
	'menu_position'       => 5
);

register_post_type( 'tf_events', $args);

}

// 2. Custom Taxonomy Registration (Event Types)

function create_eventcategory_taxonomy() {

    $labels = array(
        'name' => _x( 'Event Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Event Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Event Categories' ),
        'popular_items' => __( 'Popular Event Categories' ),
        'all_items' => __( 'All Event Categories' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Event Category' ),
        'update_item' => __( 'Update Event Category' ),
        'add_new_item' => __( 'Add New Event Category' ),
        'new_item_name' => __( 'New Event Category Name' ),
        'separate_items_with_commas' => __( 'Separate event categories with commas' ),
        'add_or_remove_items' => __( 'Add or remove event categories' ),
        'choose_from_most_used' => __( 'Choose from the most used event categories' ),
    );

    register_taxonomy('tf_eventcategory','tf_events', array(
        'label' => __('Event Category'),
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'event-category' ),
    ));

}

add_action( 'init', 'create_eventcategory_taxonomy', 0 );

// 3. Show Columns

add_filter ("manage_edit-tf_events_columns", "tf_events_edit_columns");
add_action ("manage_posts_custom_column", "tf_events_custom_columns");

function tf_events_edit_columns($columns) {

    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "tf_col_ev_cat" => "Category",
        "tf_col_ev_date" => "Dates",
        "tf_col_ev_times" => "Times",
        "title" => "Event",
        "tf_col_ev_desc" => "Description",
        );
    return $columns;

}

function tf_events_custom_columns($column) {

    global $post;
    $custom = get_post_custom();
    switch ($column)

        {
            case "tf_col_ev_cat":
                // - show taxonomy terms -
                $eventcats = get_the_terms($post->ID, "tf_eventcategory");
                $eventcats_html = array();
                if ($eventcats) {
                    foreach ($eventcats as $eventcat)
                    array_push($eventcats_html, $eventcat->name);
                    echo implode($eventcats_html, ", ");
                } else {
                _e('None', 'themeforce');;
                }
            break;
            case "tf_col_ev_date":
                // - show dates -
                $startd = $custom["tf_events_startdate"][0];
                $endd = $custom["tf_events_enddate"][0];
                $startdate = date("F j, Y", $startd);
                $enddate = date("F j, Y", $endd);
                echo $startdate . '<br /><em>' . $enddate . '</em>';
            break;
            case "tf_col_ev_times":
                // - show times -
                $startt = $custom["tf_events_startdate"][0];
                $endt = $custom["tf_events_enddate"][0];
                $time_format = get_option('time_format');
                $starttime = date($time_format, $startt);
                $endtime = date($time_format, $endt);
                echo $starttime . ' - ' .$endtime;
            break;
            case "tf_col_ev_desc";
                the_excerpt();
            break;

        }
}

// 4. Show Meta-Box

add_action( 'admin_init', 'tf_events_create' );

function tf_events_create() {
    add_meta_box('tf_events_meta', 'Events', 'tf_events_meta', 'tf_events');
}

function tf_events_meta () {

    // - grab data -

    global $post;
    $custom = get_post_custom($post->ID);
    $meta_sd = $custom["tf_events_startdate"][0];
    $meta_ed = $custom["tf_events_enddate"][0];
    $meta_st = $meta_sd;
    $meta_et = $meta_ed;
    $meta_vn = $custom["tf_events_venue"][0];
    $meta_va = $custom["tf_events_address"][0];
    $meta_eb = $custom["tf_events_eventbrite"][0];

    // - grab wp time format -

    $date_format = get_option('date_format'); // Not required in my code
    $time_format = get_option('time_format');

    // - populate today if empty, 00:00 for time -

    if ($meta_sd == null) { $meta_sd = time(); $meta_ed = $meta_sd; $meta_st = 0; $meta_et = 0;}

    // - convert to pretty formats -

    $clean_sd = date("D, M d, Y", $meta_sd);
    $clean_ed = date("D, M d, Y", $meta_ed);
    $clean_st = date($time_format, $meta_st);
    $clean_et = date($time_format, $meta_et);

    // - security -

    echo '<input type="hidden" name="tf-events-nonce" id="tf-events-nonce" value="' .
    wp_create_nonce( 'tf-events-nonce' ) . '" />';

    // - output -

    ?>
    <div class="tf-meta">
        <ul>
            <li><label>Venue Name</label><input name="tf_events_venue" value="<?php echo $meta_vn; ?>" /></li>
            <li><label>Venue Address</label><textarea name="tf_events_address" rows="3"><?php echo $meta_va; ?></textarea></li>
            <li><label>Start Date</label><input name="tf_events_startdate" class="tfdate" value="<?php echo $clean_sd; ?>" /></li>
            <li><label>Start Time</label><input name="tf_events_starttime" value="<?php echo $clean_st; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
            <li><label>End Date</label><input name="tf_events_enddate" class="tfdate" value="<?php echo $clean_ed; ?>" /></li>
            <li><label>End Time</label><input name="tf_events_endtime" value="<?php echo $clean_et; ?>" /><em>Use 24h format (7pm = 19:00)</em></li>
            <li><label>Eventbrite EID</label><input name="tf_events_eventbrite" value="<?php echo $meta_eb; ?>" /></li>
        </ul>
    </div>
    <?php
}

// 5. Save Data

add_action ('save_post', 'save_tf_events');

function save_tf_events(){

    global $post;

    // - still require nonce

	if ( isset( $_POST['tf-events-nonce'] ) && ! wp_verify_nonce( $_POST['tf-events-nonce'], 'tf-events-nonce' ) ) {
		return $post->ID;
	}
    // if ( !wp_verify_nonce( $_POST['tf-events-nonce'], 'tf-events-nonce' )) {
    //     return $post->ID;
    // }

    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    // - convert back to unix & update post

    if(!isset($_POST["tf_events_startdate"])):
        return $post;
        endif;
        $updatestartd = strtotime ( $_POST["tf_events_startdate"] . $_POST["tf_events_starttime"] );
        update_post_meta($post->ID, "tf_events_startdate", $updatestartd );

    if(!isset($_POST["tf_events_enddate"])):
        return $post;
        endif;
        $updateendd = strtotime ( $_POST["tf_events_enddate"] . $_POST["tf_events_endtime"]);
        update_post_meta($post->ID, "tf_events_enddate", $updateendd );

    if(!isset($_POST["tf_events_venue"])):
        return $post;
        endif;
        $updatevenue = $_POST["tf_events_venue"];
        update_post_meta($post->ID, "tf_events_venue", $updatevenue );

    if(!isset($_POST["tf_events_address"])):
        return $post;
        endif;
        $updateaddress = $_POST["tf_events_address"];
        update_post_meta($post->ID, "tf_events_address", $updateaddress );

    if(!isset($_POST["tf_events_eventbrite"])):
        return $post;
        endif;
        $updateeventbrite = $_POST["tf_events_eventbrite"];
        update_post_meta($post->ID, "tf_events_eventbrite", $updateeventbrite );

}

// 6. Customize Update Messages

add_filter('post_updated_messages', 'events_updated_messages');

function events_updated_messages( $messages ) {

  global $post, $post_ID;

  $messages['tf_events'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Event updated. <a href="%s">View item</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Event updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Event restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Event published. <a href="%s">View event</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Event saved.'),
    8 => sprintf( __('Event submitted. <a target="_blank" href="%s">Preview event</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview event</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Event draft updated. <a target="_blank" href="%s">Preview event</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

// 7. JS Datepicker UI

function events_styles() {
    global $post_type;
    if( 'tf_events' != $post_type )
        return;
    wp_enqueue_style('ui-datepicker', get_bloginfo('template_url') . '/style/vendor/jquery-ui-1.8.9.custom.css');
}

function events_scripts() {
    global $post_type;
    if( 'tf_events' != $post_type )
    return;
    wp_enqueue_script('jquery-ui', get_bloginfo('template_url') . '/js/jquery-ui-1.11.0.js', array('jquery'));
    wp_enqueue_script('ui-datepicker', get_bloginfo('template_url') . '/js/jquery.ui.datepicker.js');
    wp_enqueue_script('custom_script', get_bloginfo('template_url').'/js/pubforce-admin.js', array('jquery'));
}

add_action( 'admin_print_styles-post.php', 'events_styles', 1000 );
add_action( 'admin_print_styles-post-new.php', 'events_styles', 1000 );

add_action( 'admin_print_scripts-post.php', 'events_scripts', 1000 );
add_action( 'admin_print_scripts-post-new.php', 'events_scripts', 1000 );


class T5_Nav_Menu_Walker_Simple extends Walker_Nav_Menu
{

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $output     .= '<li>';
        $output     .= '<span>'.apply_filters( 'the_title', $item->title, 1, $item->ID, $id ).'</span>';
        $attributes  = '';
 
        ! empty ( $item->attr_title )
            // Avoid redundant titles
            and $item->attr_title !== $item->title
            and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
 
        ! empty ( $item->url )
            and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
 
        $attributes .= ' class="'.$item->classes[0].'"';

        $attributes  = trim( $attributes );
        $title       = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = "$args->before<a $attributes>$args->link_before$title</a>"
                        . "$args->link_after$args->after";
 
        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }


    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }
}


// Custom Meta Box for slideshow
// from http://wordpress.stackexchange.com/questions/61041/add-a-checkbox-to-post-screen-that-adds-a-class-to-the-title

/* Define the custom box */
add_action( 'add_meta_boxes', 'wpse_61041_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'wpse_61041_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function wpse_61041_add_custom_box() {
    $post_types = get_post_types();
    foreach ( $post_types as $post_type )
        add_meta_box( 
            'wpse_61041_sectionid',
            'Feature this post',
            'wpse_61041_inner_custom_box',
            $post_type,
            'side'
        );
}

/* Prints the box content */
function wpse_61041_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'wpse_61041_wpse_61041_field_nonce', 'wpse_61041_noncename' );

    $saved_slide = get_post_meta( $post->ID, 'featured_slide', true);
    if( !$saved_slide )
        $saved_slide = false;

    $saved_rec = get_post_meta( $post->ID, 'featured_rec', true);
    if( !$saved_rec )
        $saved_rec = false;

    $saved_rank = get_post_meta( $post->ID, 'featured_rank', true);
    if( !$saved_rank )
        $saved_rank = '99';
    $fields_rank = array(
        9 => __('-- Select Rank --', 'wpse'),
        0 => __('1 (highest)', 'wpse'),
        1 => __('2', 'wpse'),
        2 => __('3', 'wpse'),
        3 => __('4', 'wpse'),
        4 => __('5', 'wpse'),
        5 => __('6', 'wpse'),
        6 => __('7', 'wpse'),
        7 => __('8', 'wpse'),
        8 => __('9 (lowest)', 'wpse')
    );

    ?>
        <ul>
            <li>
                <label class="selectit"><input value="1" type="checkbox" name="featured_slide" <?php echo checked($saved_slide, true, false) ?>> Show in slideshow</label>
            </li>
            <li>
                <label class="selectit"><input value="1" type="checkbox" name="featured_rec" <?php echo checked($saved_rec, true, false) ?>> Recommend this post</label>
            </li>
            <li>
                <select name="featured_rank">
                    <?php foreach ($fields_rank as $key => $value) { ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php echo selected($saved_rank, $key, false) ?>><?php echo esc_html($value); ?></option>
                    <?php }; ?>
                </select>
            </li>
         </ul>   
    <?php


}

/* When the post is saved, saves our custom data */
function wpse_61041_save_postdata( $post_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['wpse_61041_noncename'], 'wpse_61041_wpse_61041_field_nonce' ) )
          return;

      if ( isset($_POST['featured_slide']) ){
            update_post_meta( $post_id, 'featured_slide', $_POST['featured_slide'] );
      } else { update_post_meta( $post_id, 'featured_slide', NULL ); }
      if ( isset($_POST['featured_rec']) ){
            update_post_meta( $post_id, 'featured_rec', $_POST['featured_rec'] );
      } else { update_post_meta( $post_id, 'featured_rec', NULL ); }
      if ( isset($_POST['featured_rank']) ){
            update_post_meta( $post_id, 'featured_rank', $_POST['featured_rank'] );
      } else { update_post_meta( $post_id, 'featured_rank', NULL ); }
}






// Adding pagination: http://www.wpexplorer.com/pagination-wordpress-theme/
// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
    
    function wpex_pagination() {
        
        $prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
        $next_arrow = is_rtl() ? '&larr;' : '&rarr;';
        
        global $wp_query,$article_query,$event_query;
        if($article_query) {
            $total = $article_query->max_num_pages;
        } else if($event_query) {
            $total = $event_query->max_num_pages;
        } else {
            $total = $wp_query->max_num_pages;
        }
        $big = 999999999; // need an unlikely integer
        if( $total > 1 )  {
             if( !$current_page = get_query_var('paged') )
                 $current_page = 1;
             if( get_option('permalink_structure') ) {
                 $format = 'page/%#%/';
             } else {
                 $format = '&paged=%#%';
             }
            echo paginate_links(array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => $format,
                'current'       => max( 1, get_query_var('paged') ),
                'total'         => $total,
                'mid_size'      => 3,
                'type'          => 'list',
                'prev_text'     => $prev_arrow,
                'next_text'     => $next_arrow,
             ) );
        }
    }
    
}