<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\File\Enums\Ext,
    Sub_Value_Objects\File\File,
};

// Security::stop_direct_access();

/**
 * CSS File factory.
 */
final class CSS_File extends File {
    protected static function type(): Ext {
        return Ext::CSS;
    }
}
