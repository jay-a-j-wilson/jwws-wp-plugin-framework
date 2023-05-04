<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Immediate_Dir;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\Dir\Dir
};

// Security::stop_direct_access();

/**
 * Represents a the first parent directory.
 */
final class Immediate_Dir extends Dir {
    protected static function levels(): int {
        return 1;
    }
}
