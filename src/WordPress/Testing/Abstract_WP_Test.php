<?php

namespace JWWS\WPPF\WordPress\Testing;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test,
};

Security::stop_direct_access();

/**
 */
abstract class Abstract_WP_Test extends Abstract_Test implements WP_Test {
    /**
     * @return void
     */
    public static function run(): void {
        add_action(
            'wp_loaded',
            [new static(), 'hook'],
        );
    }
}
