<?php 

// This is MUST USE PLUGIN (all files in this mu-plugins (must use plugins) folder will be automaticly loaded and activated by word press)


function studentnet_post_types() {
	// Campus Post Type
	register_post_type('campus', array(
		'show_in_rest' => true,
		'capability_type' => 'campus',
		'map_meta_cap' => true,
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array('slug' => 'campuses'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Campuses',
			'add_new_item' => 'Add New Campus',
			'edit_item' => 'Edit Campus',
			'all_items' => 'All Campuses',
			'singular_name' => 'Campus'
		),
		'menu_icon' => 'dashicons-location-alt'		
	));

	register_post_type('bloger', array(
		'capability_type' => 'post',
		'map_meta_cap' => true
	));


	// Event Post Type
	register_post_type('event', array(
		'show_in_rest' => true,
		'capability_type' => 'event',
		'map_meta_cap' => true,
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array('slug' => 'events'),
		'has_archive' => true,
		//Make posta type visible in editor wp
		'public' => true,

		// Labels all the names(titles) in wp edit menu
		'labels' => array(
			'name' => 'Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		),
		// Icon in edit wp menu
		'menu_icon' => 'dashicons-calendar'		
	));


	// Program Post Type
	register_post_type('program', array(
		'show_in_rest' => true,
		'supports' => array('title'),
		'rewrite' => array('slug' => 'programs'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Programs',
			'add_new_item' => 'Add New Program',
			'edit_item' => 'Edit Program',
			'all_items' => 'All Programs',
			'singular_name' => 'Program'
		),
		'menu_icon' => 'dashicons-awards'		
	));


	// Professor Post Type
	register_post_type('professor', array(
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'professors'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'public' => true,
		'has_archive' => true,
		'labels' => array(
			'name' => 'Professors',
			'add_new_item' => 'Add New Professor',
			'edit_item' => 'Edit Professor',
			'all_items' => 'All Professors',
			'singular_name' => 'Professor'
		),
		'menu_icon' => 'dashicons-welcome-learn-more'		
	));


	// Note Post Type
	register_post_type('note', array(
		'capability_type' => 'note',
		'map_meta_cap' => true,
		'show_in_rest' => true,
		'supports' => array('title', 'editor'),
		'public' => false,
		'show_ui' => true,
		'labels' => array(
			'name' => 'Notes',
			'add_new_item' => 'Add New Note',
			'edit_item' => 'Edit Note',
			'all_items' => 'All Notes',
			'singular_name' => 'Note'
		),
		'menu_icon' => 'dashicons-welcome-write-blog'		
	));


	// Like Post Type
	register_post_type('like', array(
		'supports' => array('title'),
		'public' => false,
		'show_ui' => true,
		'labels' => array(
			'name' => 'Likes',
			'add_new_item' => 'Add New Like',
			'edit_item' => 'Edit Like',
			'all_items' => 'All Likes',
			'singular_name' => 'Like'
		),
		'menu_icon' => 'dashicons-heart'		
	));


	// Slide Show Post Type
	register_post_type('slide', array(
		'public' => true,
		'show_in_rest' => true,
		'supports' => array('title', 'editor'),
		'labels' => array(
			'name' => 'Slide Show',
			'add_new_item' => 'Add New Slide Show',
			'edit_item' => 'Edit Slide Show',
			'all_items' => 'All Slide Shows',
			'singular_name' => 'Slide'
		),
		'menu_icon' => 'dashicons-image-rotate'		
	));


}

add_action('init', 'studentnet_post_types');


function studentnetMapKey($api) {
	$api['key'] = 'ovde se upisuje api-key koji ja nemam jer se naplacuje(mozda)'; 
	return $api;
} 

add_filter('acf/fields/google_map/api', 'studentnetMapKey');






