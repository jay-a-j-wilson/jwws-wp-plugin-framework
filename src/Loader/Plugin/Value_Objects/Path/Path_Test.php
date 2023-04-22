<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Path;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test};
use JWWS\WPPF\Loader\Plugin\Value_Objects\Basename\Basename;

Security::stop_direct_access();

/**
 */
final class Path_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::of();
        self::of_invalid();
    }

    /**
     * @return void
     */
    private static function of(): void {
        Path::of(basename: Basename::of(path: 'elementor/elementor.php'))
            ->log()
        ;
    }

    /**
     * @return void
     */
    private static function of_invalid(): void {
        Path::of(basename: Basename::of(path: 'invalid/invalid/invalid.php'))
            ->log()
        ;
    }
}
