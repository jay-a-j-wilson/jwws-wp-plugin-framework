<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name;

use Exception;
use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Factory\Name_Header_Factory;

// Security::stop_direct_access();

/**
 * The plugin name.
 */
final class Name extends Base_Value_Object {
    /**
     * @param string $fallback_name example "Plugin"
     */
    public static function of(
        Name_Header_Factory $factory,
        string $fallback_name,
    ): self {
        return new self(
            value: self::name(
                factory: $factory,
                fallback_name: $fallback_name,
            ),
        );
    }

    /**
     * Retrieves the plugin name from its header comment or defaults to the
     * specified fallback name.
     */
    private static function name(
        Name_Header_Factory $factory,
        string $fallback_name,
    ): string {
        try {
            return $factory
                ->create()
                ->__toString()
            ;
        } catch (Exception $e) {
            return $fallback_name;
        }
    }
}
