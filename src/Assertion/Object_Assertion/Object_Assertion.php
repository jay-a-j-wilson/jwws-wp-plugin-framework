<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Object_Assertion;

/**
 * Provides assertion methods related to objects.
 */
final class Object_Assertion {
    /**
     * Static factory method.
     */
    public static function of(object $object): self {
        return new self(
            object: $object,
        );
    }

    /**
     * @return void
     */
    private function __construct(private object $object) {}

    /**
     * Assert type is an instance of a class or interface.
     *
     * @param string $class   the class or interface name to check against
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws InvalidArgumentException if the assertion fails
     */
    public function is_instance_of(string $class, string $message = ''): self {
        if ($this->object instanceof $class) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Object must be an instance of {$class}",
        );
    }
}
