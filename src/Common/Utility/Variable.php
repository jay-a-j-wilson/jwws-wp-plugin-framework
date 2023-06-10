<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Utility;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

final class Variable {
    /**
     * Do not instantiate.
     */
    private function __construct() {}

    /**
     * @return string|false|void
     */
    public static function var_dump_r(
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

    /**
     * @return string|string[]|null|void
     */
    public static function pretty_var_dump_r(
        mixed $value,
        bool $return = false,
    ) {
        $contents = preg_replace(
            pattern: "/{\n\\s*}/m",
            replacement: '{}',
            subject: preg_replace(
                pattern: "/=>\n[ ]+/m",
                replacement: ' => ',
                subject: self::var_dump_r(
                    value: $value,
                    return: true,
                ),
            ),
        );

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @return string|false|void
     */
    public static function var_export_r(
        mixed $value,
        bool $return = false,
    ): string|bool {
        ob_start();
        var_export(value: $value);
        $contents = ob_get_clean();

        if ($return) {
            return $contents;
        }

        echo $contents;
    }

    /**
     * @return string|string[]|null|void
     */
    public static function pretty_var_export_r(
        mixed $value,
        bool $return = false,
    ) {
        $contents = preg_replace(
            pattern: "/=>\n[ ]+/m",
            replacement: ' => ',
            subject: self::var_export_r(
                value: $value,
                return: true,
            ),
        );

        if ($return) {
            return $contents;
        }

        echo $contents;
    }
}
