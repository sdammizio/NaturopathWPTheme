<?php

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {

	/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(120, 90, true);
	add_image_size('square', 150, 150, true);
	add_image_size('homepage-hero',1400,800,true);
	add_image_size('logoHeader',340,84,true);
	add_image_size('blogArchive',208, 336, true);
	add_image_size('blogSingleFeatured', 916, 437, true);
	add_image_size( 'squareBlogGrid', 306, 306, true );



	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location.
	* You can allow clients to create multiple menus by
  * adding additional menus to the array. */

	register_nav_menus( array(
		'primary' => 'Primary Navigation',
		'footer'=> 'Footer Navigation',
		'social'=> 'Social Menu',
		'logo'=> 'Home Link',
		'mobile'=> 'Mobile Main Menu'
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
endif;

add_action( 'after_setup_theme', 'theme_setup' );


/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function base_theme_scripts() {

//load Bootstrap

function your_script_enqueue() {
	wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array('jquery'), NULL, true );
	
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', false, NULL, 'all' );
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/css/your_style.css', array(), '1.0.0', 'all');
  
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js' ); 
 }
 
 add_action( 'wp_enqueue_scripts', 'your_script_enqueue' );

//Jquery loaded
wp_deregister_script('jquery');
  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  wp_enqueue_script(
    'scripts', //handle
    get_template_directory_uri() . '/js/scripts.js', //source
    array( 'jquery'), //dependencies
    null, // version number
    true //load in footer
  );

}

add_action( 'wp_enqueue_scripts', 'base_theme_scripts' );

function wpb_add_google_fonts() {
 
	wp_enqueue_style( 'wpb-google-fonts', '<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href=<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Domine:wght@500&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">', false ); 
	}
	 
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );



function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

/* Custom Title Tags */

function base_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'base_theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'base_theme_wp_title', 10, 2 );

/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function base_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'base_theme_page_menu_args' );


/*
 * Sets the post excerpt length to 40 characters.
 */
function base_theme_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'base_theme_excerpt_length' );

/*
 * Returns a "Continue Reading" link for excerpts
 */
function base_theme_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">Read More</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and base_theme_continue_reading_link().
 */
function base_theme_auto_excerpt_more( $more ) {
	return ' &hellip;' . base_theme_continue_reading_link();
}
add_filter( 'excerpt_more', 'base_theme_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function base_theme_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= base_theme_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'base_theme_custom_excerpt_more' );


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within base_theme_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function base_theme_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'base_theme_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function base_theme_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'base_theme_remove_recent_comments_style' );


if ( ! function_exists( 'base_theme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function base_theme_posted_on() {
	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'base_theme_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function base_theme_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


/* Here are some utility helper functions for use in your templates! */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/*adding block to editor*/
add_action('acf/init', 'register_our_blocks');

function register_our_blocks() {
/*new block for editor*/
  acf_register_block_type(array(
    'name'            => 'services-carousel',
    'title'           => __('Services Carousel'), /*what will appear in theme editor*/
    'category'        => 'common',
    'mode'            => 'auto',
    'icon'            => 'welcome-widgets-menus',
    'render_template' => '/blocks/services-carousel.php',
	'enqueue_style' => get_template_directory_uri() . '/admin/block-admin.css',
  ));

  acf_register_block_type(array(
    'name'            => 'author-bio',
    'title'           => __('Bio'), /*what will appear in theme editor*/
    'category'        => 'common',
    'mode'            => 'auto',
    'icon'            => 'welcome-widgets-menus',
    'render_template' => '/blocks/author-bio.php',
	'enqueue_style' => get_template_directory_uri() . '/admin/block-admin.css',
  ));

  acf_register_block_type(array(
    'name'            => 'blog-preview',
    'title'           => __('Blog Preview'), /*what will appear in theme editor*/
    'category'        => 'common',
    'mode'            => 'auto',
    'icon'            => 'welcome-widgets-menus',
    'render_template' => '/blocks/blog-preview.php',
	'enqueue_style' => get_template_directory_uri() . '/admin/block-admin.css',
  ));

  acf_register_block_type(array(
    'name'            => 'insta-callout',
    'title'           => __('Instagram Callout'), /*what will appear in theme editor*/
    'category'        => 'common',
    'mode'            => 'auto',
    'icon'            => 'welcome-widgets-menus',
    'render_template' => '/blocks/insta-callout.php',
	'enqueue_style' => get_template_directory_uri() . '/admin/block-admin.css',
  ));

}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Header & Footer',
		'menu_title' 	=> 'Header & Footer'
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Global Options',
		'menu_title' 	=> 'Global Options'
	));

}

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Limit except length to 125 characters.
// tn limited excerpt length by number of characters
function get_excerpt( $count ) {
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = '<p>'.$excerpt.'... <a href="'.$permalink.'">Read More</a></p>';
	return $excerpt;
	}

//Change order of fields in Comments Box on posts
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
	}
		
	add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

//Remove website url field from Comments Box on posts 

function wpbeginner_remove_comment_url($arg) {
	$arg['url'] = '';
	return $arg;
	}
	add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

//Take post excerpt from custom fields para 1 block

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt($length, $post_id = null) {
	global $post;
	$text = get_field('blog_text_block_1', $post_id);
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = $length; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}





 
