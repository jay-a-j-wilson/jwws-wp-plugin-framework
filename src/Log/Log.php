<?php

namespace JWWS\WPPF\Log;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
Interface Log {
    /**
     * Print the log.
     *
     * @param mixed $output
     */
    public static function print(mixed $output): void;
}
