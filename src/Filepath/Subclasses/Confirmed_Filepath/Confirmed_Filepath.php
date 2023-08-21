<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath;

use InvalidArgumentException;
use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\Filepath;

// Security::stop_direct_access();

/**
 * Represents a filepath that exists.
 */
final class Confirmed_Filepath extends Filepath {
    /**
     * @throws InvalidArgumentException if the file does not exist
     */
    protected static function validate(string $filepath): string {
        Path_Assertion::of(path: $filepath)->exists();

        return $filepath;
    }
}
