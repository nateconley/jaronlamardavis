<?php

/**
 * I am going to try something absolutely
 * crazy and use a singleton here
 *
 * reference: https://carlalexander.ca/singletons-in-wordpress/
 *
 * Maybe it will make it easier to read?
 */

class Jldavis_Functions {

	/**
	 * Unique instance
	 */
	private static $instance;

	/**
	 * Gets an instance
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		// Actions
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_script' ) );

		add_action( 'after_setup_theme', array( $this, 'setup' ) );

		// Filters
		add_filter( 'body_class', array( $this, 'add_body_class' ) );
	}

	/**
	 * Theme setup
	 */
	public function setup() {
		register_nav_menus( array(
			'main-nav-menu' => 'Primary',
		) );
	}

	/**
	 * Enqueue everything that we need
	 */
	public function enqueue_script() {
		// Normalize
		wp_enqueue_style(
			'normalize-css',
			'https://raw.githubusercontent.com/necolas/normalize.css/master/normalize.css',
			array(),
			'20170121'
		);

		// Google fonts
		wp_enqueue_style( 
			'google-fonts',
			'https://fonts.googleapis.com/css?family=Overpass:800|Source+Sans+Pro:400,700',
			array(),
			'20170121'
		);

		// Sass styles
		wp_enqueue_style(
			'jldavis-styles',
			get_stylesheet_directory_uri() . '/css/styles.css',
			array(),
			'20170121'
		);

		// Scripts
		wp_enqueue_script( 
			'jldavis-scripts', 
			get_stylesheet_directory_uri() . '/js/scripts.js',
			array( 'jquery' ),
			'20170121',
			true
		);
	}

	/**
	 * Add slug to body class
	 */
	public function add_body_class( $classes ) {
		global $post;

		if( isset( $post ) ) {
			$classes[] = $post->post_name;
		}

		return $classes;
	}
}

$jldavis_functions = Jldavis_Functions::get_instance();

// Require external files
require get_template_directory() . '/lib/theme-customization.php';