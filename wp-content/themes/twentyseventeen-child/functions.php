<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
function create_custom_post_type_event(){
	$labels = array(
		'name' => 'Events',
		'singular_name' => 'Event',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Event',
		'edit_item' => 'Edit Event',
		'new_item' => 'New Event',
		'view_item' => 'View Event',
		'search_items' => 'Search Events',
		'not_found' => 'No events found',
		'not_found_in_trash' => 'No events found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
	'label' => __('Events'),
	'labels' => $labels, // from array above
	'public' => true,
	'can_export' => true,
	'show_ui' => true,
	'_builtin' => false,
	'capability_type' => 'post',
	'menu_icon' => 'dashicons-calendar', // from this list
	'hierarchical' => false,
	'rewrite' => array( "slug" => "events" ), // defines URL base
	'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
	'show_in_nav_menus' => true,
	'taxonomies' => array( 'event_category', 'post_tag'), // own categories
	'has_archive' => true,
	
	);


	register_post_type('events', $args); // used as internal identifier
}

add_action('init','create_custom_post_type_event');


	


