<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\File_Assertion;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to file and/or directory paths.
 */
final class File_Assertion {
    /**
     * Factory method.
     */
    public static function of(string $filepath): self {
        String_Assertion::of(string: $filepath)->contains(substring: '.');

        return new self(
            filepath: $filepath,
        );
    }

    /**
     * @return void
     */
    private function __construct(private string $filepath) {
    }

    /**
     * Asserts file has the specified file extension.
     *
     * @param string $ext     The file extension to check for
     *                        (e.g. "jpg", "txt", etc.).
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function has_ext(string $ext, string $message = ''): self {
        $actual_ext = pathinfo(path: $this->filepath, flags: PATHINFO_EXTENSION);

        if (strtolower(string: $actual_ext) === strtolower(string: $ext)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path must have a '{$ext}' file extension type. Type '{$actual_ext}' found.",
        );
    }

    /**
     * Asserts file has a specific file size.
     *
     * @param int    $size    the expected file size in bytes
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function has_size(int $size, string $message = ''): self {
        if (filesize(filename: $this->filepath) === $size) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->filepath}' must have size of '{$size}' bytes.",
        );
    }

    /**
     * Asserts file is empty (has no content).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_blank(string $message = ''): self {
        if (filesize(filename: $this->filepath) === 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->filepath}' must be empty (have no content).",
        );
    }
}
