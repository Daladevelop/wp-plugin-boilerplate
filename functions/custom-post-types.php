<?php
	// Register post_type as custom post type with post_typetaxonomy as a taxanomy
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
?>