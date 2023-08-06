<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\Loader\Plugin\Plugin;

// Security::stop_direct_access();

/**
 * Ensures given plugin loads correctly.
 *
 * Prevents plugin activation if dependant plugins are not active. Disables a
 * plugin if dependant plugin is deactivated.
 */
interface Loader {
    /**
     * Factory method.
     */
    public static function of(Plugin $plugin): self;

    /**
     * Hooks into WordPress.
     */
    public function hook(): void;

    /**
     * Checks if loader can activate.
     */
    public function can_activate(): bool;
}
