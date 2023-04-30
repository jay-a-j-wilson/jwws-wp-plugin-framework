<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to file and/or directory paths.
 */
final class Path_Assertion {
    /**
     * Static factory method.
     */
    public static function of(string $path): self {
        return new self(
            path: $path,
        );
    }

    /**
     * @param string $string the path to be tested
     */
    private function __construct(private string $path) {
    }

    /**
     * Asserts filepath string contains only valid characters.
     *
     * @param string $message the error message to include in the exception
     *
     * @throws \InvalidArgumentException
     */
    public function valid_chars(string $message = ''): self {
        if (! preg_match(pattern: '/[<>:"\/\\\|\?\*]/', subject: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->path}' must not contain invalid characters.",
        );
    }

    /**
     * Asserts path is a directory (not a file).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_dir(string $message = ''): self {
        if (is_dir(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->path}' must be a directory.",
        );
    }

    /**
     * Asserts path is a file (not a directory).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_file(string $message = ''): self {
        if (is_file(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->path}' must be a file.",
        );
    }

    /**
     * Asserts path contains a directory.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function contains_dir(string $message = ''): self {
        if (str_contains(haystack: $this->path, needle: '/')) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->path}' does not contain a directory.",
        );
    }

    /**
     * Asserts path has the specified file extension.
     *
     * @param string $ext     The file extension to check for
     *                        (e.g. "jpg", "txt", etc.).
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function has_extension(string $ext, string $message = ''): self {
        $actual_ext = pathinfo(path: $this->path, flags: PATHINFO_EXTENSION);

        if (strtolower(string: $actual_ext) === strtolower(string: $ext)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path must have a '{$ext}' file extension type. Type '{$actual_ext}' found.",
        );
    }

    /**
     * Asserts path belongs to an existing file or directory.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function exists(string $message = ''): self {
        if (file_exists(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->path}' does not belong to an existing file or directory.",
        );
    }

    /**
     * Asserts path belongs to an existing and readable file or directory.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_readable(string $message = ''): self {
        if (is_readable(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->path}' must be readable.",
        );
    }

    /**
     * Asserts path belongs to an existing and writable file or directory.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_writable(string $message = ''): self {
        if (is_writable(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->path}' must be writable.",
        );
    }

    /**
     * Asserts path belongs to an existing and executable file or directory.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_executable(string $message = ''): self {
        if (is_executable(filename: $this->path)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->path}' must be executable.",
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
    public function blank(string $message = ''): self {
        if (filesize(filename: $this->path) === 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->path}' must be empty (have no content).",
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
        if (filesize(filename: $this->path) === $size) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->path}' must have size of '{$size}' bytes.",
        );
    }
}
