<?php

/**
 * Useful paths
 */
define('ROOT_DIR', __DIR__);
define('CONFIG_DIR', ROOT_DIR . '/config');
define('MODULE_DIR', ROOT_DIR . '/module');
define('VENDOR_DIR', ROOT_DIR . '/vendor');
define('PUBLIC_DIR', ROOT_DIR . '/public');

/**
 * Composer autoloader
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Error reporting
 *
 * @TODO: control debug via environment variable
 */
ini_set('display_errors', 1);
error_reporting(-1);