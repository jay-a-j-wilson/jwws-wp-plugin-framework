<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Hooks\Actions\Admin_Init\Admin_Init,
    Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Loader\Plugin\Plugin
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Loader {
    /**
     * Factory method
     */
    public static function of(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
        );
    }

    /**
     * @return void
     */
    private function __construct(private Plugin $plugin) {}

    /**
     * Prevent plugin activation if dependant plugins are not active.
     */
    public function hook_admin_init(): self {
        Admin_Init::of(plugin: $this->plugin)->hook();

        return $this;
    }

    /**
     * Disables a plugin if dependant plugin is deactivated.
     */
    public function hook_deactivated_plugin(): self {
        Deactivated_Plugin::of(plugin: $this->plugin)->hook();

        return $this;
    }
}
