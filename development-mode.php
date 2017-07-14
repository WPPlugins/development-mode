<?php
/*
Plugin Name: Development Mode
Description: Uses Sunrise theme on Dashboard and Frontend to visually represent development mode
Version: 1.0.0
Author: Jakob op den Brouw
Author URI: http://connexxions.me
*/

// Use SUNRISE css on adminbar in FrontEnd
//============================================================================
add_action('wp_enqueue_scripts', 'cxx_dev_mode', 99);
add_action('admin_enqueue_scripts', 'cxx_dev_mode', 99);

function cxx_dev_mode() {
	$suffix = is_rtl() ? '-rtl' : '';
	$suffix .= SCRIPT_DEBUG ? '' : '.min';
	
	wp_register_style( 'cxx-dev-mode', admin_url("css/colors/sunrise/colors$suffix.css", __FILE__) );
	
	wp_enqueue_style( 'cxx-dev-mode' );
}

// Add admin_bar text
//============================================================================
add_action('admin_bar_menu', 'cxx_dev_mode_add_toolbar_items', 9999);

function cxx_dev_mode_add_toolbar_items(){
	global $wp_admin_bar, $wpdb;
	
	$wp_admin_bar->add_menu( array( 'id' => 'cxx_dev_mode', 'title' => __( 'DEVELOPMENT SITE', 'connexxions' ), 'href' => '#', 'meta'  => array( 'title' => __( 'DEVELOPMENT SITE', 'connexxions' ))));
}