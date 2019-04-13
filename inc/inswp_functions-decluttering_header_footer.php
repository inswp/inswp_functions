<?php
/* *
 * Declutter header and footer from meta info pushed by WP or themes/plugins
 * */

/** Remove useless information on header */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link

remove_action('wp_head', 'feed_links', 2); // remove rss feed links
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml

remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

function inxwp_remove_mywp_version() {
return '';
}
add_filter('the_generator', 'inxwp_remove_mywp_version');

/** Remove emojis */

function inxwp_remove_emojis() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

/* Remove emoji from TinyMCE - TODO: Gutenberg?? */

function inxwp_noemo_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/* All emoji actions ++ remove DNS prefetch */
add_action( 'init', 'inxwp_remove_emojis' );
add_filter( 'tiny_mce_plugins', 'inxwp_noemo_tinymce' );
add_filter( 'emoji_svg_url', '__return_false' );

/** Move scripts to footer */
function inxwpf_scripts_to_footer() {
   remove_action('wp_head', 'wp_print_scripts');
   remove_action('wp_head', 'wp_print_head_scripts', 9);
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'inxwpf_scripts_to_footer' );
