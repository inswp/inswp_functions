<?php
/* *
 * Enable HSTS 
 * */

if ( ! function_exists( "inxwpf_hsts_enable" ) ) {

/** Enable HSTS */
  function inxwpf_hsts_enable() {
    header( "Strict-Transport-Security: max-age=63072000; includeSubDomains; preload" );
    /* Prevent browsers from incorrectly detecting non-scripts as scripts */
    header( "X-Content-Type-Options: nosniff" );
    /* X-Frame-Options */
    header( "Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline'; frame-ancestors 'none'" );
    header( "X-Frame-Options: DENY" );
    /* Block pages from loading when they detect reflected XSS attacks */
    header( "X-XSS-Protection: 1; mode=block" );
  }
  add_filter("send_headers", "inxwpf_hsts_enable");
}
