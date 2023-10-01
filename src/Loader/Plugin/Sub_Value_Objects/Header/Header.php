<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header;

use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Plugin_Data_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums\Type;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Represents the plugin's header value object.
 */
abstract class Header extends Base_Value_Object {
    /**
     * Returns the header type.
     */
    abstract protected static function type(): Type;

    /**
     * @param string $basename the plugin's basename
     */
    final public static function of(Plugin_Data_Factory $factory): static {
        return new static(
            value: $factory
                ->create()
                ->header(type: static::type()),
        );
    }
}
