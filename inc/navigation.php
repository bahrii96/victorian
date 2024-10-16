<?php

/**
 * Navigation elements.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		if (!$item->classes) return false;
		$class_names = join(' ', $item->classes);
		$class_names = ' class="' . esc_attr($class_names) . '"';
		$output .= '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';
		$attributes = '';

		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
		$item_output = $args->before;

		$current_url = (is_ssl() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$item_url = esc_attr($item->url);
		if ($item_url != $current_url) $item_output .= '<a' . $attributes . '>' . $item->title . '</a>';
		else $item_output .= '<a class="current-ref">' . $item->title . '</a>';

		foreach ($item->classes as $value) {
			if ('menu-item-has-children' === $value) {
				$item_output .= '<i class="fas fa-chevron-down"></i>';
			}
		}

		$item_output .= $args->after;
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}
