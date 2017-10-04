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
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
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
Hide ACF fields dashboard
 */
function _s_hide_acf_dashboard() {
  // check if this is my user account
  if ( wp_get_current_user()->user_login === 'sean' ) {
    return;
  }
  define( 'ACF_LITE' , true );
}
add_action( 'admin_init', '_s_hide_acf_dashboard' );

/*
Update ACF Local JSON save point
 */
function _s_acf_json_save_point( $path ) {
  // set new path
  $path = get_stylesheet_directory() . '/inc/acf-json';
  // return path
  return $path;
}
add_filter( 'acf/settings/save_json', '_s_acf_json_save_point' );

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
 * Featured image column for posts
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
 */
function _s_add_feat_img_column( $columns ) {
  return array_merge( $columns,
    array( 'feat_img' => __( 'Featured Image' ) )
  );
}
add_filter( 'manage_post_posts_columns', '_s_add_feat_img_column' );

function _s_feat_img_column( $column, $post_id ) {
  if ( ( $column === 'feat_img' ) && has_post_thumbnail( $post_id ) ) {
    the_post_thumbnail( array( 64, 64 ) );
  }
}
add_action( 'manage_post_posts_custom_column', '_s_feat_img_column', 10, 2 );

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
 * ACF Google Maps API Key
 */
function _s_acf_gmaps_api_key() {
  acf_update_setting( 'google_api_key', '' );
}
add_action( 'acf/init', '_s_acf_gmaps_api_key' );
