<?php
/**
 * @package brexit-countdown
 * @version 1.1.2
 */
/*
Plugin Name: Brexit Countdown
Plugin URI: https://wordpress.org/plugins/brexit-countdown
Description: brexit clock broken down into days, hours, minutes and seconds showing in the admin pages but also available on your webpages using [brexitCountdown2]
Author: Tyrone Williams
Version: 1.1.2

*/

// This just provides the basic html to link to the css 
function brexitCountdownScript() {
	?>
		<p id="brexitCountdown"></p>
	<?php 
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'brexitCountdownScript' );


// the css and script files have been connected below
function brexitCountdownStylesAndScript() {
	wp_register_style( 'custom_wp_admin_css', plugins_url('/assets/brexitCountdownStyles.css', __FILE__));
	wp_register_script( 'custom_jquery', plugins_url('/assets/brexitCountdownScript.js', __FILE__) );
	wp_enqueue_style( 'custom_wp_admin_css' );
	wp_enqueue_script('custom_jquery');
}

// the css and script files have been activated with the add_action below
add_action('admin_enqueue_scripts', 'brexitCountdownStylesAndScript');


class BrexitClock {
 	function process_shortcode($atts, $content = null) {

	return '<span id="brexitCountdown2" class="brexitCountdown"></span>';
}

	function brexit_clock_scripts($atts) {

	$vars = shortcode_atts( array(
		'projectMessage'   => 'projectMessage',
		
	), $atts );

	// Localize the script with new data
	$translation_array = array(
		'projectMessage' => __( $vars['projectMessage'], 'brexittimer' ),
	
	);

	wp_register_script( 'brexit_clock_scripts', plugins_url('/assets/brexitCountdown2Script.js', __FILE__) );
	wp_localize_script( 'brexit_clock_scripts', 'brexit_string', $translation_array );
	wp_enqueue_script('brexit_clock_scripts');

}

	// Add action to process shortcodes.
	function register() {
        
	//Enqueue the scripts with localization.
	add_action('wp_enqueue_scripts', array($this,'brexit_clock_scripts'));

	// Add action to process shortcodes.
	add_shortcode('brexitCountdown2', array($this, 'process_shortcode'));

	}

}

/**
 * Load the class in a variable.
 * Instatiate default function register();
 */ 
$timer_load = new BrexitClock;
$timer_load->register();