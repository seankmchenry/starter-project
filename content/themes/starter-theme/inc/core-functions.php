<?php
/**
 * Core functions
 *
 * @package _s
 */

/*
Flush rewrite rules on theme activation
 */
function _s_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', '_s_flush_rewrite_rules' );

/*
Force category & postname permalink structure
 */
function _s_custom_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', '_s_custom_permalinks' );

/*
Disable public user registration page
 */
add_action( 'login_init', function() {
  add_filter( 'pre_option_users_can_register', '__return_null' );
} );

/*
Yoast SEO meta box priority
 */
function _s_move_yoast_seo_meta() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', '_s_move_yoast_seo_meta' );

/*
Remove dashboard widgets
 */
function _s_remove_dash_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
}
add_action( 'wp_dashboard_setup', '_s_remove_dash_widgets' );

/*
Add ACF options page
 */
function _s_add_acf_options_page() {
  if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page();
  }
}
add_action( 'init', '_s_add_acf_options_page' );

/*
Add and update image sizes
 */
function _s_custom_image_sizes() {
  update_option( 'large_size_w', 800 );
  update_option( 'large_size_h', 600 );
  update_option( 'large_crop', 1 );

  update_option( 'medium_size_w', 600 );
  update_option( 'medium_size_h', 450 );
  update_option( 'medium_crop', 1 );

  update_option( 'thumbnail_size_w', 200 );
  update_option( 'thumbnail_size_h', 200 );
  update_option( 'thumbnail_crop', 1 );

  // hero size
  add_image_size( 'hero', 1600, 640, true );
}
add_action( 'init', '_s_custom_image_sizes' );

/**
 * Allow SVG upload through media library
 */
function _s_allow_svg_upload( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', '_s_allow_svg_upload', 10, 1 );

/**
 * Get post thumbnail image alt text
 */
function _s_get_image_alt( $post_id ) {
  $thumb_id = get_post_thumbnail_id( $post_id );
  $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
  return $alt;
}
