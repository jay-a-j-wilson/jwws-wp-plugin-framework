<?php

namespace JWWS\WPPF\Traits\Var_Export_R;

use JWWS\WPPF\{Common\Security\Security, Common\Testing\Tests, Common\Testing\Test_Data\Primitives\Test_Primitive};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Var_Export_R_Tests extends Tests {
    use Test_Primitive;
    use Var_Export_R;

    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::var_export_r_Tests();
        self::pretty_var_export_r_Tests();
    }

    /**
     * Undocumented function.
     */
    public static function var_export_r_Tests(): void {
        error_log(
            message: self::var_export_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }

    /**
     * Undocumented function.
     */
    public static function pretty_var_export_r_Tests(): void {
        error_log(
            message: self::pretty_var_export_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }
}
