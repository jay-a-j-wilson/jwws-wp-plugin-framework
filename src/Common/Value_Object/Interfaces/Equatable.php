<?php

namespace JWWS\WPPF\Common\Value_Object\Interfaces;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Value_Object\Value_Object};

Security::stop_direct_access();

/**
 * Interface for objects that can be compared for equality.
 */
interface Equatable {
    /**
     * Compares this object with another object for equality.
     *
     * @param Value_Object $other the object to compare with
     *
     * @return bool true if the objects are equal, false otherwise
     */
    public function equals(Value_Object $other): bool;
}
