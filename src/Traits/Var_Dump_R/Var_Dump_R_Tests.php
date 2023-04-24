<?php

namespace JWWS\WPPF\Traits\Var_Dump_R;

use JWWS\WPPF\{Common\Security\Security, Common\Testing\Tests, Common\Testing\Test_Data\Primitives\Test_Primitive};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Var_Dump_R_Tests extends Tests {
    use Test_Primitive;
    use Var_Dump_R;

    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::var_dump_r_Tests();
        self::pretty_var_dump_r_Tests();
    }

    /**
     * Undocumented function.
     */
    public static function var_dump_r_Tests(): void {
        error_log(
            message: self::var_dump_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }

    /**
     * Undocumented function.
     */
    public static function pretty_var_dump_r_Tests(): void {
        error_log(
            message: self::pretty_var_dump_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }
}
