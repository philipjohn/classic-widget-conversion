<?php
/*
Plugin Name: Classic Widget Conversion
Textdomain: classic-widget
*/

Class Classic_Widget extends WP_Widget {

	/**
	 * Initialise the widget.
	 */
	function __construct() {
		$widget_ops = array(
			'classname'             => 'classic-widget',
			'description'           => __( 'A classic widget.', 'classic-widget' ),
		);

		parent::__construct(
			'Classic_Widget', // Base ID
			__( 'Classic Widget', 'classic-widget' ), // Name
			$widget_ops // Args
		);
	}

	/**
	 * The widget output.
	 */
	public function widget( $args, $instance ) {
		echo '<p>This is the widget output.</p>';
	}

	/**
	 * The widget form in the admin.
	 */
	public function form( $instance ) {
		echo '<p>No options needed here.</p>';
	}

	/**
	 * Not really necessary.
	 */
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
add_action( 'widgets_init', function(){ register_widget( 'Classic_Widget' ); } );