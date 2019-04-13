<?php

if ( ! function_exists( "inxwpf_no_browser_nag" ) ) {
	/*  Disable WordPress browser nag */

	 function inxwpf_no_browser_nag() {
		 if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			 return;
		 }

		 $key = md5( $_SERVER['HTTP_USER_AGENT'] );
		 add_filter( 'pre_site_transient_browser_' . $key, '__return_null' );
	 }

}

add_action( "admin_init", "inxwpf_no_browser_nag" );
