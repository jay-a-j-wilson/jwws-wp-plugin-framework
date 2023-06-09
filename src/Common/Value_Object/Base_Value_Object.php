<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Value_Object;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * Value object base class.
 */
abstract class Base_Value_Object implements Value_Object {
    /**
     * @return void
     */
    final protected function __construct(public readonly mixed $value) {
    }

    final public function equals(Value_Object $other): bool {
        return $this->value === $other->value;
    }

    final public function __toString(): string {
        return (string) $this->value;
    }
}
