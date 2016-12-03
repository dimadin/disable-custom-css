<?php

/**
 * The Disable Custom CSS Plugin
 *
 * Disable frontend database query and Customizer section for Custom CSS.
 *
 * @package Disable_Custom_CSS
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Custom CSS
 * Plugin URI:  http://blog.milandinic.com/wordpress/plugins/disable-custom-css/
 * Description: Disable frontend database query and Customizer section for Custom CSS.
 * Author:      Milan Dinić
 * Author URI:  http://blog.milandinic.com/
 * Version:     1.0
 * Text Domain: disable-custom-css
 * Domain Path: /languages/
 * License:     GPL
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Disable Custom CSS in the frontend head
remove_action( 'wp_head', 'wp_custom_css_cb', 11 );

/**
 * Remove Custom CSS section from the Customizer.
 *
 * @since 1.0
 */
function disable_custom_css_customize_section() {
	if ( $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
		$GLOBALS['wp_customize']->remove_section( 'custom_css' );
	}
}
add_action( 'wp_loaded', 'disable_custom_css_customize_section', 11 );
