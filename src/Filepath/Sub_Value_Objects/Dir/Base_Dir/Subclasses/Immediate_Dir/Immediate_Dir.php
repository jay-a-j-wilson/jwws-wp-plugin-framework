<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Immediate_Dir;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\Dir\Base_Dir\Base_Dir
};

// Security::stop_direct_access();

/**
 * Represents a the first parent directory.
 */
final class Immediate_Dir extends Base_Dir {
    protected static function levels(): int {
        return 1;
    }
}
