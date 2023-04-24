<?php

namespace JWWS\WPPF\WordPress\Testing;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class WP_Tests extends Tests {
    /**
     * Undocumented function.
     */
    final public static function run(): void {
        add_action(
            'wp_loaded',
            [new static(), 'hook'],
            1,
        );
    }
}
