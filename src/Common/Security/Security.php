<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Security;

// Security::stop_direct_access();

/**
 * The Security class provides static methods for implementing security
 * measures.
 *
 * This class contains utility methods to enhance the security of your
 * application by preventing direct access to scripts and implementing basic
 * security checks.
 *
 * It is designed as a static class and cannot be instantiated.
 */
final class Security {
    /**
     * Private constructor to prevent class instantiation.
     *
     * The constructor is set as private to ensure that the `Security` class
     * cannot be instantiated. This is because it is designed as a static class,
     * intended to be used by accessing its methods statically.
     */
    private function __construct() {}

    /**
     * Prevents direct access to scripts.
     *
     * This method checks if the constant 'ABSPATH' is defined. 'ABSPATH' is
     * commonly used in frameworks or applications to define the absolute path
     * to the main application file. If 'ABSPATH' is not defined, it indicates
     * that the script is being accessed directly, outside the intended
     * application context.
     *
     * If direct access is detected, an error message is logged and the script
     * execution is terminated immediately to prevent any unauthorized access.
     */
    public static function stop_direct_access(): void {
        if (\defined(constant_name: 'ABSPATH')) {
            return;
        }

        error_log(message: 'Direct URL access attempted.');

        exit;
    }
}
