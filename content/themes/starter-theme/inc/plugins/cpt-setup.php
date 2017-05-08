<?php
/**
 * cpt-setup.php
 */

// load the PostType class
use PostTypes\PostType;

// post type icons can be found here:
// https://developer.wordpress.org/resource/dashicons

/*
CPT: Custom Post
 */
$custom_post_labels = [
  'name' => 'custom_post',
  'singular' => 'Custom Post',
  'plural' => 'Custom Posts',
  'slug' => 'custom-post'
];
$custom_post_options = [
  'menu_icon' => 'dashicons-admin-post'
];
$custom_post = new PostType( $custom_post_labels, $custom_post_options );

// add editor columns
$custom_post->columns()->set([
  'cb' => '<input type="checkbox" />',
  'title' => __( 'Title' ),
  'author' => __( 'Author' ),
  'category' => __( 'Category' ),
  'thumbnail' => __( 'Featured Image' ),
  'date' => __( 'Date' )
]);
