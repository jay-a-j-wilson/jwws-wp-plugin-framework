<?php

namespace JWWS\WPPF\Traits\Var_Dump_R;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test,
    Common\Testing\Test_Data\Test_Primitive
};

Security::stop_direct_access();

/**
 */
final class Var_Dump_R_Test extends Abstract_Test {
    use Var_Dump_R;
    use Test_Primitive;

    /**
     * @return void
     */
    public static function run(): void {
        self::var_dump_r_test();
        self::pretty_var_dump_r_test();
    }

    /**
     * @return void
     */
    public static function var_dump_r_test(): void {
        error_log(
            message: self::var_dump_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }

    /**
     * @return void
     */
    public static function pretty_var_dump_r_test(): void {
        error_log(
            message: self::pretty_var_dump_r(
                value: self::associate_array_mixed(),
                return: true,
            ),
        );
    }
}
