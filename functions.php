<?php

class Tips_for_Trip {

	var $version = 1.0;
	var $textdomain = 'tipsfortrips';

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
	}

	public function setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scrips' ) );
		add_action( 'admin_init', array( $this, '' ) );
	}

	public function enqueue_scrips() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'google-geochart', 'https://www.google.com/jsapi', array(), $this->version, true );
		wp_enqueue_script( 'google-maps', '//maps.google.com/maps/api/js?sensor=false', array(), $this->version, true );
		wp_enqueue_script( 'general', get_template_directory_uri() . '/js/general.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_style( 'general-style', get_template_directory_uri() . '/style.css', array(), $this->version );
	}
}

global $theme;
$theme = new Tips_for_Trip();