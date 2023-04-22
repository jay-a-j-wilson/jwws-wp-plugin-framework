<?php

namespace JWWS\WPPF\Common\Value_Object\Interfaces;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * Interface for objects that can be represented as a value.
 */
interface Valueable {
    /**
     * Returns the value representation of the object.
     *
     * @return mixed the value representation of the object
     */
    public function value(): mixed;
}
