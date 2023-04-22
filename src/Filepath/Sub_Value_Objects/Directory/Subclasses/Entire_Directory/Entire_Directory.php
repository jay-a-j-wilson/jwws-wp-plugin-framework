<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\Directory\Directory};

Security::stop_direct_access();

/**
 * Represents a the entire parent directory.
 */
final class Entire_Directory extends Directory {
    /**
     * Undocumented function.
     */
    protected static function levels(): int {
        return 0;
    }
}
