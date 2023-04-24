<?php

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Hooks\Actions\Admin_Init,
    Loader\Hooks\Actions\Deactivated_Plugin,
    Loader\Plugin\Plugin
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Loader {
    /**
     * Creates loader.
     */
    public static function of(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Prevent plugin activation if dependant plugins are not active.
     */
    public function hook_admin_init(): self {
        Admin_Init::hook(plugin: $this->plugin);

        return $this;
    }

    /**
     * Disables a plugin if dependant plugin is deactivated.
     */
    public function hook_deactivated_plugin(): self {
        Deactivated_Plugin::hook(plugin: $this->plugin);

        return $this;
    }
}
