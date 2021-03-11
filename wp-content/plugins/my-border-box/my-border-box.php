<?php 

/*
Plugin Name: My Border Box
Description: Great plugin for borders
Author: Bojan
Version: 1.0
*/

function loadMyBlockFiles() {
	wp_enqueue_script(
		'my-super-unique-handle',
		plugin_dir_url(__FILE__) . 'my-block.js',
		array('wp-blocks', 'wp-i18n', 'wp-editor'),
		true
	);
}

 
add_action('enqueue_block_editor_assets', 'loadMyBlockFiles');

// function gutenberg_my_block_init() {
//     register_post_meta( 'post', 'author', array(
//         'show_in_rest' => true,
//     ) );
// }
// add_action( 'init', 'gutenberg_my_block_init' );