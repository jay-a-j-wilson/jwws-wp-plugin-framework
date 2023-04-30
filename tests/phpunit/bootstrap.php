<?php declare(strict_types=1);

// path to test lib bootstrap.php
$test_lib_bootstrap_file = __DIR__ . '/includes/bootstrap.php';

if (! file_exists($test_lib_bootstrap_file)) {
    echo PHP_EOL . 'Error : unable to find ' . $test_lib_bootstrap_file . PHP_EOL;

    exit('' . PHP_EOL);
}

// set plugin and options for activation
$GLOBALS['wp_tests_options'] = [
    'active_plugins' => [
        'wp-simple-plugin/wp-simple-plugin.php',
    ],
    'wpsp_test' => true,
];

// call test-lib's bootstrap.php
require_once $test_lib_bootstrap_file;

$current_user = new WP_User(1);
$current_user->set_role('administrator');

echo PHP_EOL;
echo 'Using Wordpress core : ' . ABSPATH . PHP_EOL;
echo PHP_EOL;
