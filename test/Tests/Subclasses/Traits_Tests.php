<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Traits_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::var_dump_r();
        self::var_export_r();
    }

    /**
     * Undocumented function.
     */
    private static function var_dump_r(): void {
        Traits\Var_Dump_R\Var_Dump_R_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function var_export_r(): void {
        Traits\Var_Export_R\Var_Export_R_Test::run();
    }
}
