<?php
/*
Plugin Name: Plugin Boilerplate
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Boilerplate for WordPress plugins containing basic functionality.
Version: 1.0
Author: Rickard Andersson, Mikael Jorhult
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL, GPL2, MIT
	
	Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// require_once('widgets.php');

class wp_plugin_boilerplate {
	
	final private $plugin_name = "plugin_boilerplate";
	
	function __construct() {
		// add_action('init', array($this, 'init_custom_post_types'));
		// add_action('init', array($this, 'init_localization'));
		// add_action('init', array($this, 'init_scripts'));
		// add_action('init', array($this, 'init_shortcodes'));
		// add_action('init', array($this, 'init_styles'));
	}
	
	private function init_localization() {
		if(!load_plugin_textdomain($this->plugin_name, '/wp-content/languages/')) {
			load_plugin_textdomain($this->plugin_name, '/wp-content/plugins/' . $this->plugin_name . '/languages/');
		}
	}
	
	private function init_scripts() {
		/* Only enqueue scripts on frontend. */
		if(!is_admin()) {
			/* Use jQuery from Google CDN */
			wp_deregister_script('jquery');
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js');
			wp_enqueue_script('jquery');
			
			if(function_exists('plugins_url')) {
				wp_enqueue_script('plugin-script', plugins_url('/scripts/script.js', __FILE__), array('jquery'), '1.0', false);
			} else {
				wp_enqueue_script('plugin-script', WP_PLUGIN_URL . '/' . $this->plugin_name . '/scripts/script.js', array('jquery'), '1.0', false);
			}
		}
	}
	
	private function init_styles() {
		/* Only enqueue styles on frontend. */
		if(!is_admin()) {
			if(function_exists('plugins_url')) {
				wp_enqueue_style('plugin-stylesheet', plugins_url('/styles/style.css', __FILE__), array(), '1.0', 'all');
			} else {
				wp_enqueue_style('plugin-stylesheet', WP_PLUGIN_URL . '/' . $this->plugin_name . '/styles/styles.css', array(), '1.0', 'all');
			}
		}
	}
	
	private function init_shortcodes() {
		add_shortcode('shortcode', 'plugin_boilerplate_shortcode');
	}
	
	function plugin_boilerplate_shortcode($atts) {
		extract(shortcode_atts(array(
			'attribute' => 'default',
		), $atts));
	}
	
	private function init_custom_post_types() {
		// Register post_type as custom post type with post_type taxonomy as a taxanomy
		register_post_type('post_type', array(
			'labels' => array(
				'name' => __('Post Types', 'plugin-biolerplate'),
				'singular_name' => 'Post type',
				'add_new' => 'Add new',
				'add_new_item' => 'Add new post type',
				'edit_item' => 'Edit post type',
				'new_item' => 'New post type',
				'view_item' => 'Show post type',
				'search_items' => 'Search post type',
				'not_found' =>  'Not found',
				'not_found_in_trash' => 'No post type was found in trash',
				'parent_item_colon' => 'Parent:'
			),
			'public' => true,
			'exclude_from_search' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'show_in_nav_menus' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
		));
		
		register_taxonomy('post_type_taxonomy', 'taxonomy', array(
			'hierarchical' => true,
			'labels' => array(
				'name' => 'Taxonomies',
				'singular_name' => 'Taxonomy',
				'search_items' => 'Search taxonomy',
				'all_items' => 'All taxonomies',
				'parent_item' => 'Parent taxonomy',
				'parent_item_colon' => 'Parent taxonoy:',
				'edit_item' => 'Edit taxonomy',
				'update_item' => 'Update taxonomy',
				'add_new_item' => 'Add new taxonomy',
				'new_item_name' => 'Taxonomy name',
				'menu_name' => 'Taxonomies',
			),
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'taxonomy')
		));
	}
}
?>