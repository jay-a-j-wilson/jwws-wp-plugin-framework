<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Name;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Name_Test extends WP_Test {
    public static function hook(): void {
        self::of_pass();
        self::of_fail();
    }

    /**
     * Undocumented function.
     */
    private static function of_pass(): void {
        Name::of(
            basename: 'elementor/elementor.php',
            fallback_name: 'Elementor',
        )
            ->log()
        ;
    }

    /**
     * Undocumented function.
     */
    private static function of_fail(): void {
        try {
            Name::of(
                basename: 'invalid/invalid.php',
                fallback_name: 'Uninstalled Plugin',
            );
        } catch (\Exception $e) {
            self::log_passed();
        }
    }
}
