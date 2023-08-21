<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory;
// Security::stop_direct_access();

/**
 * Represents a plugin's filepath.
 */
final class Filepath extends Base_Value_Object {
    /**
     * @param string $basename example plugin-folder/plugin-file.php
     */
    public static function of(Dir $dir, Factory $factory): self {
        return new self(
            value: $dir . $factory->create(),
        );
    }
}
