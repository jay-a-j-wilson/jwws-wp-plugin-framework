<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Full_Dir;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\Dir\Dir
};

// Security::stop_direct_access();

/**
 * Represents a the full parent directory.
 */
final class Full_Dir extends Dir {
    protected static function levels(): int {
        return 0;
    }
}
