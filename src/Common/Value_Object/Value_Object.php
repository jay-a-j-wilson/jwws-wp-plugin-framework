<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Value_Object;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

// Security::stop_direct_access();

/**
 * Value object base class.
 */
abstract class Value_Object implements \Stringable {
    use Log;

    /**
     * Enforces use of static factory method.
     */
    final protected function __construct(public readonly mixed $value) {
    }

    /**
     * Compares this object with another object for equality.
     *
     * Uses (===) not (==).
     *
     * @param self $other the object to compare with
     *
     * @return bool true if the objects are equal, false otherwise
     */
    final public function equals(self $other): bool {
        return $this->value === $other->value;
    }

    /**
     * {@inheritDoc}
     *
     * Used by factory methods to create complex value objects with cleaner
     * syntax.
     */
    final public function __toString(): string {
        return (string) $this->value;
    }
}
