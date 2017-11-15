<?php
/**
 * staging.php
 */

ini_set('display_errors', 0);
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);

define('SAVEQUERIES', false);
define('WP_POST_REVISIONS', 5);

// define('DISALLOW_FILE_MODS', true);
// define('AUTOSAVE_INTERVAL', 180);
// define('WP_MEMORY_LIMIT', '128M');