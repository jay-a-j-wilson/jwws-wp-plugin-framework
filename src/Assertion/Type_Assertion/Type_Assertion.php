<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Type_Assertion;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to variable typing.
 */
final class Type_Assertion {
    /**
     * Factory method.
     */
    public static function of(mixed $type): self {
        return new self(
            type: $type,
        );
    }

    /**
     * @return void
     */
    private function __construct(private mixed $type) {
    }

    /**
     * Asserts type is null.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_null(string $message = ''): self {
        if (is_null(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be null.',
        );
    }

    /**
     * Asserts type is null.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_not_null(string $message = ''): self {
        if (! is_null(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be not null.',
        );
    }

    /**
     * Asserts type is string.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_string(string $message = ''): self {
        if (is_string(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be a string.',
        );
    }

    /**
     * Asserts type is numeric.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_numeric(string $message = ''): self {
        if (is_numeric(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be numeric.',
        );
    }

    /**
     * Asserts type is a boolean.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_boolean(string $message = ''): self {
        if (is_bool(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be a boolean.',
        );
    }

    /**
     * Asserts type is a callable function.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_callable(string $message = ''): self {
        if (is_callable(value: $this->type)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Type must be a callable function.',
        );
    }
}
