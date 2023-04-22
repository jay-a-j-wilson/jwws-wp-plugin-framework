<?php

namespace JWWS\WPPF\Common\Value_Object\Subclasses;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Value_Object;

Security::stop_direct_access();

/**
 * Represents a string based value object.
 */
abstract class String_Value_Object extends Value_Object {
    /**
     * @param string $value
     */
    protected function __construct(protected string $value) {
    }

    /**
     * @return string
     */
    public function value(): string {
        return $this->value;
    }
}
