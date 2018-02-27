<?php
/**
 * tgm-setup.php
 */

/*
Register the required plugins for this theme.
 */
function _s_register_required_plugins() {
  /*
  Development
   */
  $development = array(
    array(
      'name' => 'Advanced Custom Fields',
      'slug' => 'advanced-custom-fields',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Force Regenerate Thumbnails',
      'slug' => 'force-regenerate-thumbnails',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Simple Page Sidebars',
      'slug' => 'simple-page-sidebars',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Smush Image Compression and Optimization',
      'slug' => 'wp-smushit',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Soil',
      'slug' => 'soil',
      'source' => 'https://github.com/roots/soil/archive/master.zip',
      'external_url' => 'https://github.com/roots/soil',
      'required' => true,
      'force_activation' => true
    )
  );

  /*
  Staging
   */
  $staging = array(
    array(
      'name' => 'Cerber Security & Antispam',
      'slug' => 'wp-cerber',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Ninja Forms – The Easy and Powerful Forms Builder',
      'slug' => 'ninja-forms',
      'required' => true,
      'force_activation' => true
    )
  );

  /*
  Production
   */
  $production = array(
    array(
      'name' => 'BackUpWordPress',
      'slug' => 'backupwordpress',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Maintenance Mode',
      'slug' => 'lj-maintenance-mode',
      'required' => false,
      'force_activation' => false
    ),
    array(
      'name' => 'W3 Total Cache',
      'slug' => 'w3-total-cache',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Yoast SEO',
      'slug' => 'wordpress-seo',
      'required' => true,
      'force_activation' => true
    )
  );

  // set plugins array based on environment
  if ( WP_ENV === 'development' ) {
    $plugins = $development;
  } elseif ( WP_ENV === 'staging' ) {
    $plugins = array_merge( $development, $staging );
  } elseif ( WP_ENV === 'production' ) {
    $plugins = array_merge( $development, $staging, $production );
  }

  /*
  Array of configuration settings. Amend each line as needed.
   */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', '_s_register_required_plugins' );

/*
Reset install notice if previously dismissed
 */
// TGM_Plugin_Activation::get_instance()->update_dismiss();
