<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename;

use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_PHP_Factory\Immediate_Dir_PHP_Factory;

// Security::stop_direct_access();

/**
 * Represents a WordPress Plugin's basename.
 */
final class Basename extends Base_Value_Object {
    public static function of(Immediate_Dir_PHP_Factory $factory): self {
        return new self(
            value: $factory->create(),
        );
    }
}
