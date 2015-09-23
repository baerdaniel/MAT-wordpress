<?php
/*
Plugin Name: Unsync Page Templates
*/

add_filter('pll_copy_post_metas', 'unsync_template');
function unsync_template($metas) {
	return array_diff($metas, array('_wp_page_template'));
} ?>