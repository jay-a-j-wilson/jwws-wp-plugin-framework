<?php

namespace JWWS\WPPF\Assertion\Traits\File;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to file values.
 */
trait File {
    /**
     * Throws an exception if the given filepath string contains invalid
     * characters.
     *
     * @param string $message the error message to include in the exception
     *
     * @throws \InvalidArgumentException
     */
    public function valid_chars(string $message = ''): self {
        if (! preg_match(pattern: '/[<>:"\/\\\|\?\*]/', subject: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->value}' must not contain invalid characters.",
        );
    }

    /**
     * Asserts value is a directory (not a file).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function directory(string $message = ''): self {
        if (is_dir(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->value}' must be a directory.",
        );
    }

    /**
     * Asserts value is a file (not a directory).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function file(string $message = ''): self {
        if (is_file(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Path '{$this->value}' must be a file.",
        );
    }

    /**
     * Asserts file exists.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function file_exists(string $message = ''): self {
        if (file_exists(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' does not exist.",
        );
    }

    /**
     * Asserts value is the specified file extension.
     *
     * @param string $ext     The file extension to check for
     *                        (e.g. "jpg", "txt", etc.).
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function extension(string $ext, string $message = ''): self {
        if (strtolower(string: $this->value) === strtolower(string: $ext)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File must be of extension type '{$ext}'. Type '{$this->value}' found.",
        );
    }

    /**
     * Asserts value is readable.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function readable(string $message = ''): self {
        if (is_readable(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' must be readable.",
        );
    }

    /**
     * Asserts value is writable.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function writable(string $message = ''): self {
        if (is_writable(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' must be writable.",
        );
    }

    /**
     * Asserts value is executable.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function executable(string $message = ''): self {
        if (is_executable(filename: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' must be executable.",
        );
    }

    /**
     * Asserts value is empty (has no content).
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function blank(string $message = ''): self {
        if (filesize(filename: $this->value) === 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' must be empty (have no content).",
        );
    }

    /**
     * Asserts value has a specific file size.
     *
     * @param int    $size    the expected file size in bytes
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function has_size(int $size, string $message = ''): self {
        if (filesize(filename: $this->value) === $size) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "File '{$this->value}' must have size of '{$size}' bytes.",
        );
    }
}
