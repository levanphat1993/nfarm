<?php

/*
	
@package nfarmtheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ($formats as $format) {
	$output[] = (@$options[$format] == 1 ? $format : '');
}

if (!empty($options)) {
	add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if (@$header == 1) {
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if (@$background == 1) {
	add_theme_support( 'custom-background' );
}


// Add Theme Support Post Thumbnails
add_theme_support('post-thumbnails');

/* Activate Nav Menu Option */
function nfarm_register_nav_menu()
{
	register_nav_menu('primary', 'Header Navigation Menu');
}
add_action('after_setup_theme', 'nfarm_register_nav_menu');


/*
	========================
		BLOG LOOP CUSTOM FUNCTIONS
	========================
*/

function nfarm_posted_meta()
{
	$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
	
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;

	if (!empty($categories)) {
		foreach ($categories as $category) {
			
			if ($i > 1) {
				$output .= $separator;
			}

			$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'View all posts in%s', $category->name ) .'">' . esc_html( $category->name ) .'</a>';
			$i++; 
		}
	}
	
	return '<span class="posted-on">Posted <a href="'. esc_url( get_permalink() ) .'">' . $posted_on . '</a> ago</span> / <span class="posted-in">' . $output . '</span>';
}

function nfarm_posted_footer()
{
	return 'tags list and comment link';
}
