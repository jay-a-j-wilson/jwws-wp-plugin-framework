<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\File\Base_File\Base_File,
    Sub_Value_Objects\File\Base_File\Enums\Ext,
};

// Security::stop_direct_access();

/**
 * PHP File factory.
 */
final class PHP_File extends Base_File {
    protected static function type(): Ext {
        return Ext::PHP;
    }
}
