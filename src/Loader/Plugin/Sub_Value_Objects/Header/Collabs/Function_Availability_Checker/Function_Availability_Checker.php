<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Function_Availability_Checker;

final class Function_Availability_Checker {
    public static function new_instance(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct() {}

    /**
     * Ensures function `get_plugin_data()` is available.
     *
     * Even in admin the function `get_plugin_data()` is NOT available by
     * default.
     */
    public function ensure_available(): void {
        if (function_exists(function: 'get_plugin_data')) {
            return;
        }

        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
}
