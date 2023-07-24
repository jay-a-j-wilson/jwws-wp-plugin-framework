<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Value_Object\Base_Value_Object;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Value_Object;

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
    public function __construct(public readonly mixed $value) {}

    final public function equals(Value_Object $other): bool {
        return $this->value === $other->value;
    }

    final public function __toString(): string {
        return (string) $this->value;
    }
}
