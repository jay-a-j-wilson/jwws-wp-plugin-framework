<?php

namespace JWWS\WPPF\Traits\Var_Export_R;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Common\Testing\Test_Data\Test_Primitive
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Var_Export_R_Test extends Test {
    use Test_Primitive;
    use Var_Export_R;

    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::var_export_r_test();
        self::pretty_var_export_r_test();
    }

    /**
     * Undocumented function.
     */
    public static function var_export_r_test(): void {
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
    public static function pretty_var_export_r_test(): void {
        error_log(
            message: self::pretty_var_export_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }
}
