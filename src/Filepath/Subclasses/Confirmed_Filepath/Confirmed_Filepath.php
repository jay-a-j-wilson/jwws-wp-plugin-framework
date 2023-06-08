<?php

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath;

use JWWS\WPPF\{
    Assertion\Path_Assertion\Path_Assertion,
    Common\Security\Security,
    Filepath\Filepath
};

// Security::stop_direct_access();

/**
 * Represents a filepath that exists.
 */
final class Confirmed_Filepath extends Filepath {
    /**
     * @throws \InvalidArgumentException if the file does not exist
     */
    protected static function validate(string $filepath): string {
        Path_Assertion::of(path: $filepath)->exists();

        return $filepath;
    }
}
