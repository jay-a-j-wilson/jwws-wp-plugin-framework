<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Name;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 */
final class Name_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::of_pass();
        self::of_fail();
    }

    /**
     * @return void
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
     * @return void
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
