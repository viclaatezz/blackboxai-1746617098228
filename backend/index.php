<?php
// Path to the system folder
$system_path = 'system';

// Path to the application folder
$application_folder = 'application';

// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

// Resolve the system path for increased reliability
if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path).'/';
}

// Ensure the system path ends with a slash
$system_path = rtrim($system_path, '/').'/';

// Define main path constants
define('BASEPATH', str_replace('\\', '/', $system_path));
define('APPPATH', $application_folder.'/');

// Load the bootstrap file
require_once BASEPATH.'core/CodeIgniter.php';
