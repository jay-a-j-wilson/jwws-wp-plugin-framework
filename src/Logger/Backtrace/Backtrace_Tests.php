<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Backtrace_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::create();
    }

    /**
     * Undocumented function.
     */
    public static function create(): void {
        Backtrace::create()
            ->get_stack_frames()
            ->log()
        ;
    }
}
