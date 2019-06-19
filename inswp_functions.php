<?php
/* *
 * Plugin Name: InsWP Custom Functions
 * Plugin URI: https://github.com/inswp/inswp_functions/
 * Description: Custom functions for WordPress
 * Author: insomnux
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses
 * Text Domain: inswp_functions
 * Version: 0.12.2
 * Author URI: //github.com/inswp
 * */

// If this file is called directly, abort.
if ( !defined( "WPINC" ) ) {
  die;
}

/** Disable themes and plugins editor on dashboard. */
define( "DISALLOW_FILE_EDIT", true );

/** Disable autop */
remove_filter( "the_content", "wpautop" );
remove_filter( "the_excerpt", "wpautop" );

/** Include modules */
include "inc/inswp_functions-authors_can_add_category.php";
include "inc/inswp_functions-decluttering_header_footer.php";
include "inc/inswp_functions-disable_browser_nag.php";
include "inc/inswp_functions-enable-hsts.php";
include "inc/inswp_functions-remove_REST_api.php";
include "inc/inswp_functions-remove_tmi.php";
