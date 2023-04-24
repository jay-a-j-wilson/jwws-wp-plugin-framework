<?php
/**
 * Plugin Name:  WP Plugin Framework
 * Description:  Dependencies for JWWS plugins.
 * Version:      3.0.0b
 * Requires PHP: 8.0
 * Author:       Jay Wilson
 * Author URI:   https://jaywilsonwebsolutions.com
 * License:      GPL2.
 */

namespace JWWS\WPPF;

use JWWS\WPPF\{
    Common\Security\Security,
    Tests\Tests
};

require __DIR__ . '/vendor/autoload.php';

// Security::stop_direct_access();

// Tests::run();
