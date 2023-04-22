<?php

namespace JWWS\WPPF\WordPress\Testing;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class WP_Test extends Test {
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
