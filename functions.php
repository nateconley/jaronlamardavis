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

		add_action( 'wp_head', array( $this, 'aspect_ratios' ) );

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

		// Media page script
		if ( is_page( 'media' ) ) {
			wp_register_script(
				'isotope-js',
				get_stylesheet_directory_uri() . '/js/isotope.min.js',
				'20170122',
				true
			);

			wp_register_script(
				'images-loaded-js',
				get_stylesheet_directory_uri() . '/js/images-loaded.min.js',
				'20170122',
				true
			);

			wp_enqueue_script( 
				'jldavis-media-js', 
				get_stylesheet_directory_uri() . '/js/media.js',
				array( 'jquery', 'images-loaded-js', 'isotope-js' ),
				'20170122',
				true
			);
		}
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

	/**
	 * Front page tiles aspect ratios
	 */
	public function aspect_ratios() {
		$image_one_meta = wp_get_attachment_metadata( get_post_meta( 5, 'jldavis_front_page_image_one_id', 1 ) );
		$image_two_meta = wp_get_attachment_metadata( get_post_meta( 5, 'jldavis_front_page_image_two_id', 1 ) );
		$image_three_meta = wp_get_attachment_metadata( get_post_meta( 5, 'jldavis_front_page_image_three_id', 1 ) );

		$image_one_ratio = $image_one_meta[ 'width' ] / $image_one_meta[ 'height' ];
		$image_two_ratio = $image_two_meta[ 'width' ] / $image_two_meta[ 'height' ];
		$image_three_ratio = $image_three_meta[ 'width' ] / $image_three_meta[ 'height' ];

		echo '<style type="text/css">';
			echo '.home .photo-tiles .image-one {';
				echo '-webkit-box-flex: ' . $image_one_ratio . ';';
				echo '-webkit-flex: ' . $image_one_ratio . ';';
				echo '-ms-box-flex: ' . $image_one_ratio . ';';
				echo ' flex: ' . $image_one_ratio . ';';
			echo '}';
			echo '.home .photo-tiles .image-two {';
				echo '-webkit-box-flex: ' . $image_two_ratio . ';';
				echo '-webkit-flex: ' . $image_two_ratio . ';';
				echo '-ms-box-flex: ' . $image_two_ratio . ';';
				echo ' flex: ' . $image_two_ratio . ';';
			echo '}';
			echo '.home .photo-tiles .image-three {';
				echo '-webkit-box-flex: ' . $image_three_ratio . ';';
				echo '-webkit-flex: ' . $image_three_ratio . ';';
				echo '-ms-box-flex: ' . $image_three_ratio . ';';
				echo ' flex: ' . $image_three_ratio . ';';
			echo '}';
		echo '</style>';
	}
}

$jldavis_functions = Jldavis_Functions::get_instance();

// Require external files
require get_template_directory() . '/lib/theme-customization.php';