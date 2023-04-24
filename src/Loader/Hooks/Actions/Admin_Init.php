<?php

namespace JWWS\WPPF\Loader\Hooks\Actions;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Hooks\Actions\Admin_Notices\Admin_Notices,
    Loader\Plugin\Plugin
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Admin_Init {
    /**
     * Undocumented function.
     */
    public static function hook(Plugin $plugin): void {
        add_filter(
            'admin_init',
            [new self(plugin: $plugin), 'callback'],
            10,
            2,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Fires as an admin screen or script is being initialized.
     *
     * @docs https://developer.wordpress.org/reference/hooks/admin_init/
     */
    public function callback(): void {
        if ($this->plugin->can_activate()) {
            return;
        }

        $this->plugin
            ->inactive_dependencies()
            ->each(callback: fn (Plugin $dependant_plugin) =>
                Admin_Notices::hook(
                    dependant_plugin: $dependant_plugin,
                    plugin: $this->plugin,
                ))
        ;

        $this->plugin->deactivate();

        unset($_GET['activate']);
    }
}
