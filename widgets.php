<?php

class plugin_boilerplate_widget extends WP_Widget {

	final private $default_title = "Plugin boilerplate title"; 
	final private $plugin_name = "plugin_boilerplate";

	function plugin_boilerplate_widget() {
		$options = array('description' => __("Plugin boilerplate description", $this->plugin_name));
    		parent::WP_Widget(false, __('Plugin boilerplate', $this->plugin_name), $options);    
  	}
	
	/**
	* Logic for handling updates from the widget form
	* @param array $new_instance
	* @param array $old_instance
	* @return array 
	*/
	function update($new_instance, $old_instance) {
  		// Insert update logic here, and check that all the values in $new_instance are valid for your particular widget
  	
  		return $new_instance; 
	}	
  
	/**
	* Function for handling the widget control in admin panel
	* @param array $instance 	An array of current values for this instance
	* @return void 
	*/
	function form($instance) {
  		// Get stored preferences, rememer to escape them!
    		$title = strlen($instance['title']) > 0 ? esc_attr($instance['title']) : esc_attr($this->default_title);
		
		?>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e("Title:", $this->plugin_name) ?></label><br/>
		<input type="text" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $title?>" /><br/>
		<?php
	}

	/**
	* Function for displaying the widget on the page
	* @param array $args
	* @param array $instance
	* @return void
	*/
	function widget($args, $instance) {
		// Will extract $before_widget, $after_widget, $before_title and $after_title				
		extract($args); 
		
		// Will extract your options
		extract($instance); 
		
		$title = strlen($title) > 0 ? $title : $this->default_title;
		
	    	echo $before_widget;
  		echo $before_title . $title . $after_title;
		
		// Insert your widget markup here
		
		echo $after_widget;		
	}	
}