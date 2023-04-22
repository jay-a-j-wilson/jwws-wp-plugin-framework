<?php

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Basename;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 */
final class Basename_Test extends WP_Test {
    /**
     * @return void
     */
    public static function hook(): void {
        self::of();
        self::of_sub_dir();
        self::of_no_dir();
    }

    /**
     * @return void
     */
    private static function of(): void {
        Error_Logger::log(
            output: Basename::of(
                path: 'elementor/elementor.php',
            )
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_sub_dir(): void {
        Error_Logger::log(
            output: Basename::of(
                path: 'dir/dir/file.php',
            )
                ->value(),
        );
    }

    /**
     * @return void
     */
    private static function of_no_dir(): void {
        Error_Logger::log(
            output: Basename::of(
                path: 'file.php',
            )
                ->value(),
        );
    }
}
