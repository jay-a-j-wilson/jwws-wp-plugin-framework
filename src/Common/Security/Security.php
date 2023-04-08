<?php

namespace JWWS\WPPF\Common\Security;

Security::stop_direct_access();

/**
 */
final class Security {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Stops current scripts if url is accessed directly.
     *
     * @return void
     */
    public static function stop_direct_access(): void {
        if (defined(constant_name: 'ABSPATH')) {
            return;
        }

        error_log('Direct url access attempted.');

        exit;
    }
}
