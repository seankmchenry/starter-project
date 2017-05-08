<?php
/**
 * acf-setup.php
 */

// return if this is dev environment
if ( WP_ENV === 'development' ) {
  return;
}

// hide field group menu from users
if ( wp_get_current_user()->user_login !== 'sean' ) {
  define( 'ACF_LITE' , true );
}

/*
ACF field groups
 */
// export field export code here:
