<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test
};

Security::stop_direct_access();

/**
 */
final class Backtrace_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
        // self::create();
        self::pluck();
    }

    /**
     * @return void
     */
    public static function create(): void {
        Backtrace::create()
            ->log()
        ;
    }

    /**
     * @return void
     */
    public static function pluck(): void {
        Backtrace::create()
            ->log()
            ->pluck(key: 'args')
            ->log()
        ;
    }
}
