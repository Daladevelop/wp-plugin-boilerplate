<?php
	function plugin_boilerplate_shortcode($atts) {
		extract(shortcode_atts(array(
			'attribute' => 'default',
		), $atts));
	}
	
	add_shortcode('shortcode', 'plugin_boilerplate_shortcode');
?>