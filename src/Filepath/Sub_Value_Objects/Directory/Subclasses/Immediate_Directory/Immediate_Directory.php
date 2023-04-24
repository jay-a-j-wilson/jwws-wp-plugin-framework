<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath\Sub_Value_Objects\Directory\Directory};

// Security::stop_direct_access();

/**
 * Represents the parent folder.
 */
final class Immediate_Directory extends Directory {
    /**
     * Undocumented function.
     */
    protected static function levels(): int {
        return 1;
    }
}
