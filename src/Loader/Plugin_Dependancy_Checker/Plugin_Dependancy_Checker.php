<?php

namespace JWWS\WPPF\Loader\Plugin_Dependancy_Checker;

use JWWS\WPPF\{
    Template_Engine\Template,
    Loader\Plugin
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Plugin_Dependancy_Checker {
    /**
     * @param private Plugin $parent_plugin
     * @param private Plugin $child_plugin
     */
    public function __construct(
        private Plugin $parent_plugin,
        private Plugin $child_plugin,
    ) {
    }

    /**
     * @return void
     */
    public function activate(): void {
        if (! is_admin()) {
            return;
        }

        if (! current_user_can(capability: 'activate_plugins')) {
            return;
        }

        // Check required plugin
        if (is_plugin_active(plugin: $this->parent_plugin->get_filename())) {
            return;
        }

        add_action('admin_notices', [$this, 'print_required_plugin_notice']);

        deactivate_plugins(plugins: $this->child_plugin->get_filename());

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }

    /**
     * Display the error HTML to the user.
     *
     * @return void
     */
    public function print_required_plugin_notice(): void {
        echo (new Template(filename: __DIR__ . '/templates/required_plugin_notice'))
            ->assign(names: 'parent_plugin_name', value: $this->parent_plugin->get_name())
            ->assign(names: 'child_plugin_name', value: $this->child_plugin->get_name())
            ->output()
        ;
    }
}
