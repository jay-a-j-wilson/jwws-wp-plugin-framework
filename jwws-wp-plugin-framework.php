<?php
/*
Plugin Name: WP Plugin Framework
description: Dependencies for JWWS plugins.
Version: 1.0
Author: Jay Wilson
Author URI: https://jaywilsonwebsolutions.com
License: GPL2
 */

namespace JWWS\WP_Plugin_Framework;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

require __DIR__ . '/vendor/autoload.php';

//Tests\App::hook();
