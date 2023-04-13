<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test
};

Security::stop_direct_access();

/**
 */
final class Backtrace_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::create();
    }

    /**
     * @return void
     */
    public static function create(): void {
        Backtrace::create()
            ->get_stack_frames()
            ->log()
        ;
    }
}
