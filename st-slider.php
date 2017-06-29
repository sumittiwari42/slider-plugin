<?php
/**
 * Plugin Name: ST Slider
 * Description: Add slider on your site by using [st_slider] shortcode for more detail please see detail page.
 * Author: Sumit Tiwari
 * Version: 1.0.0
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'STAP_PLUGIN_PATH', plugin_dir_url( __FILE__ ) );

require_once('st-slider-post.php');
require_once('short-code/st-slider-short-code.php');

// Enqueue the Style and script

function stap_slider_scripts() {
	//enqueue the style
    wp_enqueue_style( 'stap-style', constant('STAP_PLUGIN_PATH') . 'assets/css/style.min.css');

    //enqueue the script
    wp_enqueue_script( 'stap-script', constant('STAP_PLUGIN_PATH') . 'assets/js/script.min.js', array('jquery'), '0.0.1', true );
}

add_action( 'wp_enqueue_scripts', 'stap_slider_scripts' );