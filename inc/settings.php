<?php

if (function_exists('acf_add_options_page')) {
	$core_page = acf_add_options_page(array(
		'page_title' => 'Custom Settings',
		'menu_title' => 'Custom Settings',
		'menu_slug' => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect' => false,
		'icon_url' => 'dashicons-performance',
	));
	acf_add_options_sub_page(array(
		'page_title' => __('Header Settings'),
		'menu_title' => __('Header Settings'),
		'parent_slug' => $core_page['menu_slug'],
	));
	acf_add_options_sub_page(array(
		'page_title' => __('Footer Settings'),
		'menu_title' => __('Footer Settings'),
		'parent_slug' => $core_page['menu_slug'],
	));
	acf_add_options_sub_page(array(
		'page_title' => __('Form Global'),
		'menu_title' => __('Form Global'),
		'parent_slug' => $core_page['menu_slug'],
	));
}
