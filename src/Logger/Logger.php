<?php

namespace JWWS\WPPF\Logger;

use JWWS\WPPF\Security\Security;

Security::stop_direct_access();

/**
 */
Interface Logger {
    /**
     * Logs the log.
     *
     * @param mixed $output
     * 
     * @return mixed $output let pass through
     */
    public static function log(mixed $output): mixed;
}
