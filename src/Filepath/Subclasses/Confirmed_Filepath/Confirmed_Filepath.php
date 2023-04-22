<?php

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security,
    Filepath\Filepath
};

Security::stop_direct_access();

/**
 * Represents a filepath that exists.
 */
final class Confirmed_Filepath extends Filepath {
    /**
     * @param string $path
     *
     * @throws \InvalidArgumentException if the file does not exist
     *
     * @return string
     */
    protected static function validate(string $path): string {
        Assertion::of(value: $path)->file_exists();

        return $path;
    }
}