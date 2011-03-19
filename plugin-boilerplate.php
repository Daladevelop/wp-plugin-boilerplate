<?php
/*
Plugin Name: Plugin Boilerplate
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Boilerplate for WordPress plugins containing basic functionality.
Version: 1.0
Author: Rikard Andersson, Henrik Karlsson, Mikael Jorhult
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

// require_once('functions/administration.php');
// require_once('functions/custom-post-types.php');
// require_once('functions/database.php');
// require_once('functions/localization.php');
// require_once('functions/shortcodes.php');
// require_once('functions/widgets.php');

function plugin_boilerplate_init() {
	/* Only enqueue styles and scripts on frontend. */
	if(!is_admin()) {
		/* Use jQuery from Google CDN */
		/*wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js');
		wp_enqueue_script('jquery');*/
		
		// wp_enqueue_style('plugin-stylesheet', plugins_url('/scripts/script.js', __FILE__), array(), '1.0', 'all');
		// wp_enqueue_script('plugin-script', plugins_url('/styles/style.css', __FILE__), array(), '1.0', false);
	}
}

add_action('init', 'plugin_boilerplate_init');
?>