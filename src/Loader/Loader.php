<?php

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Hooks\Actions\{
    Admin_Init,
    Deactivated_Plugin
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Loader {
    /**
     * Creates loader.
     *
     * @param Plugin $plugin
     *
     * @return self for chaining
     */
    public static function create(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
        );
    }

    /**
     * @param Plugin $plugin
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Prevent plugin activation if dependant plugins are not active.

     * @return self for chaining
     */
    public function hook_admin_init(): self {
        Admin_Init::hook(plugin: $this->plugin);

        return $this;
    }

    /**
     * Disables a plugin if dependant plugin is deactivated.
     * 
     * @return self for chaining
     */
    public function hook_deactivated_plugin(): self {
        Deactivated_Plugin::hook(plugin: $this->plugin);

        return $this;
    }
}
