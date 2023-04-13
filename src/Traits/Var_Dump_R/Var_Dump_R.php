<?php

namespace JWWS\WPPF\Traits\Var_Dump_R;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
trait Var_Dump_R {
    /**
     * @param mixed $value
     * @param bool  $return
     *
     * @return string|string[]|null|void
     */
    private static function pretty_var_dump_r(
        mixed $value,
        bool $return = false,
    ) {
        $contents = preg_replace(
            pattern: "/=>\n[ ]+/m",
            replacement: ' => ',
            subject: self::var_dump_r(
                value: $value,
                return: true,
            ),
        );

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @param mixed $value
     * @param bool  $return
     *
     * @return string|false|void
     */
    private static function var_dump_r(
        mixed $value,
        bool $return = false,
    ): string|bool {
        ob_start();
        var_dump(value: $value);
        $contents = ob_get_clean();

        if ($return) {
            return $contents;
        }

        echo $contents;
    }
}
