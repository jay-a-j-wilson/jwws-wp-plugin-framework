<?php

namespace JWWS\WPPF\Common\Value_Object;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Interfaces\Equatable,
    Common\Value_Object\Interfaces\Valueable,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 * Represents a value object.
 */
abstract class Value_Object implements
    \Stringable,
    Equatable,
    Valueable {
    use Log;

    /**
     * Undocumented function.
     */
    final public function equals(self $other): bool {
        return $this->value() === $other->value();
    }

    /**
     * Undocumented function.
     */
    public function __toString(): string {
        return (string) $this->value();
    }
}
