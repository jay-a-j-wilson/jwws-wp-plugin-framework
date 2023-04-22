<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Basename;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Basename_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public static function hook(): void {
        self::of();
        self::of_sub_dir();
        self::of_no_dir();
    }

    /**
     * Undocumented function.
     */
    private static function of(): void {
        Error_Logger::log(
            output: Basename::of(
                basename: 'elementor/elementor.php',
            )
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_sub_dir(): void {
        Error_Logger::log(
            output: Basename::of(
                basename: 'dir/dir/file.php',
            )
                ->value(),
        );
    }

    /**
     * Undocumented function.
     */
    private static function of_no_dir(): void {
        Error_Logger::log(
            output: Basename::of(
                basename: 'file.php',
            )
                ->value(),
        );
    }
}
