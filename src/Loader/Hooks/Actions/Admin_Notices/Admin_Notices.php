<?php

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Plugin,
    Template\Template
};

Security::stop_direct_access();

/**
 */
final class Admin_Notices {
    /**
     * @param Plugin $dependant_plugin
     * @param Plugin $plugin
     *
     * @return self
     */
    public static function hook(Plugin $dependant_plugin, Plugin $plugin): void {
        add_filter(
            'admin_notices',
            [
                new self(
                    parent_plugin: $dependant_plugin,
                    child_plugin: $plugin,
                ),
                'callback',
            ],
            10,
            2,
        );
    }

    /**
     * @param Plugin $parent_plugin
     * @param Plugin $child_plugin
     */
    private function __construct(
        private Plugin $parent_plugin,
        private Plugin $child_plugin,
    ) {
    }

    /**
     * Prints admin screen notices.
     * 
     * @docs https://developer.wordpress.org/reference/hooks/admin_notices/
     * 
     * @return void
     */
    public function callback(): void {
        echo Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                names: 'parent_plugin_name', 
                value: $this->parent_plugin->name()
            )
            ->assign(
                names: 'child_plugin_name', 
                value: $this->child_plugin->name()
            )
            ->output()
        ;
    }
}
