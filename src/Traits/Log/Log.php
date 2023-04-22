<?php

namespace JWWS\WPPF\Traits\Log;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
};

Security::stop_direct_access();

/**
 * Undocumented trait.
 */
trait Log {
    /**
     * Undocumented function.
     */
    public function log(): self {
        Error_Logger::log_verbose(output: $this);

        return $this;
    }
}
