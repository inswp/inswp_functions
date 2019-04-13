<?php
/* *
 * Allow "Author" users to add new categories 
 * */

if ( ! function_exists( "inxwpf_author_can_add_categories" ) ) {
  /** Allow authors to add new categories */
  function inxwpf_author_can_add_categories() {
     if ( ! current_user_can( 'author' ) )
        return;
     if ( current_user_can( 'author' ) ) {
        $GLOBALS['wp_roles']->add_cap( 'author','manage_categories' );
     }
  }
  add_action( 'admin_init', 'inxwpf_author_can_add_categories', 10, 0 );
}
