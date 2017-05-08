<?php
/**
 * tgm-setup.php
 */

/*
Register the required plugins for this theme.
 */
function _s_register_required_plugins() {
  /*
  Local plugins
   */
  $plugins = array(
    array(
      'name' => 'ACF-PHP-Recovery',
      'slug' => 'ACF-PHP-Recovery',
      'source' => 'https://github.com/seankmchenry/ACF-PHP-Recovery/archive/master.zip',
      'required' => true,
      'force_activation' => true,
      'external_url' => 'https://github.com/seankmchenry/ACF-PHP-Recovery'
    ),
    array(
      'name' => 'Advanced Custom Fields Pro',
      'slug' => 'advanced-custom-fields-pro',
      'source' => 'https://github.com/ecmdesign/advanced-custom-fields-pro/archive/master.zip',
      'required' => true,
      'force_activation' => true,
      'external_url' => 'https://github.com/ecmdesign/advanced-custom-fields-pro'
    ),
    array(
      'name' => 'Force Regenerate Thumbnails',
      'slug' => 'force-regenerate-thumbnails',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Imsanity',
      'slug' => 'imsanity',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Soil',
      'slug' => 'soil',
      'source' => 'https://github.com/roots/soil/archive/master.zip',
      'required' => true,
      'force_activation' => true,
      'external_url' => 'https://github.com/roots/soil'
    )
  );

  /*
  Remote plugins
   */
  $plugins_remote = array(
    array(
      'name' => 'BackUpWordPress',
      'slug' => 'backupwordpress',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'Loginizer',
      'slug' => 'loginizer',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'W3 Total Cache',
      'slug' => 'w3-total-cache',
      'required' => true,
      'force_activation' => false
    ),
    array(
      'name' => 'Yoast SEO',
      'slug' => 'wordpress-seo',
      'required' => true,
      'force_activation' => true
    )
  );

  // merge the local and remote plugin
  // arrays if we're not in dev environment
  if ( WP_ENV !== 'development' ) {
    $plugins = array_merge( $plugins, $plugins_remote );
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
TGM_Plugin_Activation::get_instance()->update_dismiss();
