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

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Load up the admin JS scripts.
	 *
	 * Scripts required for the creation of a block that allows for the widget title to show in the
	 * widget list of the block-based sidebar editor.
	 */
	function admin_enqueue_scripts() {

		// Only act on the widgets screen.
		$screen = get_current_screen();
		if ( 'widgets' !== $screen->id ) {
			return;
		}

		// Enqueue the script.
		wp_enqueue_script(
			'heavy-custom-html-block',
			plugin_dir_url( __FILE__ ) . 'build/index.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-editor' )
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