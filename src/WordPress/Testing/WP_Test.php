<?php

namespace JWWS\WPPF\WordPress\Testing;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
interface WP_Test {
    /**
     * Hooks into WordPress and runs tests.
     *
     * @return void
     */
    public function hook(): void;
}
