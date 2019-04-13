<?php
/* *
 * Remove/hide REST API (not advised anymore)
 * */

class InxRemoveJsonApi {
  public static function onRestAuthenticationErrorsFilter($params) {
    return new WP_Error(
      "rest_api_disabled",
      "REST API not found"
    );
  }
}
add_filter('rest_authentication_errors', 'InxRemoveJsonApi::onRestAuthenticationErrorsFilter');

/* Remove API url from headers */
remove_action( "xmlrpc_rsd_apis", "rest_output_rsd" );
remove_action( "wp_head", "rest_output_link_wp_head", 10 );
remove_action( "template_redirect", "rest_output_link_header", 11 );

/* Remove oEmbed links */
remove_action( "rest_api_init", "wp_oembed_register_route" );
add_filter( "embed_oembed_discover", "__return_false" );
remove_filter( "oembed_dataparse", "wp_filter_oembed_result", 10 );
remove_action( "wp_head", "wp_oembed_add_discovery_links" );
remove_action ("wp_head", "wp_oembed_add_host_js" );
