<?php

namespace JWWS\WPPF\Common\Value_Object\Subclasses;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Value_Object;

Security::stop_direct_access();

/**
 * Represents an array based value object.
 */
abstract class Array_Value_Object extends Value_Object {
    /**
     * @param array $value
     */
    protected function __construct(protected array $value) {
    }

    /**
     * @return array
     */
    public function value(): array {
        return $this->value;
    }
}
