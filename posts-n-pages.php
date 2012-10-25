<?php
/*
Plugin Name: Post 'n Page Views
Plugin URI: http://www.designbyrono.com/posts-n-pages/
Description:  Tracks the number of views in pages and posts, in the admin area. To show view counts in your post/page template, add this snippet of code: <code>&lt;?php print_page_views(get_the_ID()); ?&gt;</code>. Requires <em>JetPack by Wordpress.com</em>.
Version: 1.0
Author: Rono
Author URI: http://www.designbyrono.com
*/



// ----- initialize

add_action('admin_head',					'add_views_style');
add_action('in_admin_header',				'wp_get_post_stats');
add_action('wp_head',						'wp_get_post_stats');

add_action('manage_posts_custom_column',	'show_views_in_row',10,2);
add_action('manage_pages_custom_column',	'show_views_in_row',10,2);

add_filter('manage_pages_columns',			'show_views_in_header');
add_filter('manage_posts_columns',			'show_views_in_header');



// ----- add_views_style()

function add_views_style(){

	echo
	'<style type="text/css">
	.column-views {
		width: 60px;
		text-align: right !important;
	}
	</style>';
}



// ----- show_views_in_header()

function show_views_in_header($columns){
	$columns['views'] = __('Views');
	return $columns;
}



// ----- show_views_row()

function show_views_in_row($column_name, $post_id){
	if ($column_name != 'views') return;
	$pv = wp_get_post_views($post_id);
	echo $pv ? $pv : 0;
}



// ----- main()

if (!function_exists('print_page_views')):

	function print_page_views($post_id) {
		$views = wp_get_post_views($post_id);
		$views = $views ? $views : 0;
		echo number_format_i18n($views) . ' views';
	}

endif;



// ----- wp_get_post_stats()

function wp_get_post_stats() {
	$post_stats = null;

	if (function_exists('stats_get_csv')) {
		global $post_stats;
		$post_stats = stats_get_csv('postviews', '&days=-1&limit=-1&summarize');
	}
}



// ----- wp_get_post_views()

function wp_get_post_views($post_id) {
	global $post_stats;

	if (!empty($post_stats)) {
		foreach ($post_stats as $p) {
			if ($p['post_id'] == $post_id) {
				return $p['views'];
			}
		}
	}
}

?>
