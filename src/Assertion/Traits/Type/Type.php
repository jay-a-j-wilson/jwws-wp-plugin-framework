<?php

namespace JWWS\WPPF\Assertion\Traits\Type;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to variable typing.
 */
trait Type {
    /**
     * Asserts value is the expected type.
     *
     * @param string $type    the expected type of the value
     * @param string $message the error message to include in the exception
     *
     * @throws \InvalidArgumentException if the value is not of the expected
     *                                   type
     */
    public function type(string $type, string $message = ''): self {
        if (gettype(value: $this->value) === $type) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value must be type of {$type}.",
        );
    }

    /**
     * Assert value is an instance of a class or interface.
     *
     * @param string $class   the class or interface name to check against
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws InvalidArgumentException if the assertion fails
     */
    public function instance_of(string $class, string $message = ''): self {
        if ($this->value instanceof $class) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be an instance of {$class}",
        );
    }

    /**
     * Asserts value is string.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function string(string $message = ''): self {
        if (is_string(value: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be a string.",
        );
    }

    /**
     * Asserts value is numeic.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function numeric(string $message = ''): self {
        if (is_numeric(value: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be numeric.",
        );
    }

    /**
     * Asserts value is a boolean.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @retun self
     */
    public function boolean(string $message = ''): self {
        if (is_bool(value: $this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be a boolean.",
        );
    }

    /**
     * Asserts value is a function.
     *
     * @source https://stackoverflow.com/a/2835633
     */
    public function function(string $message = ''): bool {
        if (is_string(value: $this->value) && function_exists(function: $this->value)) {
            return $this;
        }

        if (is_object(value: $this->value) && ($this->value instanceof \Closure)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be a function.",
        );
    }
}
