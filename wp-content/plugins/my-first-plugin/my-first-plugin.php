<?php 

/*
Plugin Name: My First Plugin
Description: This plugin will change your life. 
*/

add_filter('the_content', 'amazingContentEdits');

function amazingContentEdits($content) {
	$content = $content . '<p class="rightsPlugin">All content belongs to Student Net</p>';
	$content = str_replace('Lorem', 'KENZO', $content);
	// $content = str_replace('.', '(((`::`)))', $content);
	// $content = $content . '[programCount]';
	return $content;
}

// Shortcode functions should return the text that is to be used to replace the shortcode
add_shortcode('programCount', 'programCountFunction');

function programCountFunction() {

	$countProgram = wp_count_posts('program')->publish;
	return $countProgram;
}