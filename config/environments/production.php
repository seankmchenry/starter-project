<?php
/**
 * production.php
 */

define('WP_CACHE', true);
define('WP_POST_REVISIONS', 5);

ini_set('display_errors', 0);
define('SCRIPT_DEBUG', false);

define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', false);

// define('DISALLOW_FILE_MODS', true);
// define('AUTOSAVE_INTERVAL', 180);
// define('WP_MEMORY_LIMIT', '128M');