<?php

namespace JWWS\WPPF\Common\Value_Object\Subclasses;

use JWWS\WPPF\Common\{
    Security\Security,
    Value_Object\Value_Object
};

Security::stop_direct_access();

/**
 * Represents a string based value object.
 */
abstract class String_Value_Object extends Value_Object {
    /**
     * Undocumented function.
     */
    protected function __construct(protected readonly string $value) {
    }

    /**
     * Undocumented function.
     */
    final public function value(): string {
        return $this->value;
    }
}
