<?php
/* *
 * Remove unnecessary information or error messages
 * */

/** Disable display of unnecessary information during login */
if ( ! function_exists( "inxwpf_wp_wrong_login" ) ) {
  function inxwpf_wp_wrong_login() {
    return "Wrong info";
  }
  add_filter("login_errors", "inxwpf_wp_wrong_login");
}
