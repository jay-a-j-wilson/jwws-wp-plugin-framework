<?php declare(strict_types=1);

declare(strict_booleans=1);

namespace JWWS\WPPF\Assertion\Boolean_Assertion;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Provides assertion methods related to booleans.
 */
final class Boolean_Assertion {
    /**
     * Factory method.
     */
    public static function of(mixed $boolean): self {
        return new self(
            boolean: $boolean,
        );
    }

    /**
     * @return void
     */
    private function __construct(private mixed $boolean) {
    }

    /**
     * Asserts boolean is true.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_true(string $message = ''): self {
        if ($this->boolean == true) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Boolean must be true.',
        );
    }

    /**
     * Asserts boolean is not true.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_not_true(string $message = ''): self {
        if ($this->boolean != true) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Boolean must not be true.',
        );
    }

    /**
     * Asserts boolean is false.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_false(string $message = ''): self {
        if ($this->boolean == false) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Boolean must be false.',
        );
    }

    /**
     * Asserts boolean is not false.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_not_false(string $message = ''): self {
        if ($this->boolean != false) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Boolean must not be false.',
        );
    }
}
