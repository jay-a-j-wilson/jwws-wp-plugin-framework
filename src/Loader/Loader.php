<?php

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\Loader\View\View;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Loader {
    /**
     * Creates loader.
     *
     * @param Plugin $plugin
     *
     * @return self
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
     * @return void
     */
    public function activate(): void {
        if (
            ! is_admin()
            || ! current_user_can(capability: 'activate_plugins')
            || ! $this->plugin->has_inactive_dependencies()
        ) {
            return;
        }

        foreach ($this->plugin->get_inactive_dependencies()->get_all() as $dependant_plugin) {
            add_action(
                'admin_notices',
                [
                    View::create(
                        parent_plugin: $dependant_plugin,
                        child_plugin: $this->plugin,
                    ),
                    'render',
                ],
            );
        }

        $this->plugin->deactivate();

        unset($_GET['activate']);
    }

    /**
     * @param string $plugin path to plugin file relative to plugin's directory
     *
     * @return void
     */
    public function deactivate(string $plugin): void {
        if ($this->plugin->includes_dependecy(plugin: $plugin)) {
            $this->plugin->deactivate();
        }
    }
}
