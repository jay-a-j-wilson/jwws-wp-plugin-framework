<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Path;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Tests};
use JWWS\WPPF\Loader\Plugin\Value_Objects\Basename\Basename;

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Path_Tests extends WP_Tests {
    /**
     * Undocumented function.
     */
    public static function hook(): void {
        self::of();
        self::of_invalid();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Path::of(basename: Basename::of(basename: 'elementor/elementor.php'))
            ->log()
        ;
    }

    /**
     * Undocumented function.
     */
    private static function of_invalid(): void {
        Path::of(basename: Basename::of(basename: 'invalid/invalid/invalid.php'))
            ->log()
        ;
    }
}
