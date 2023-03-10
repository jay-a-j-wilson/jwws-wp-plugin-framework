<?php

namespace JWWS\WPPF\Loader\View;

use JWWS\WPPF\{
    Template_Engine\Template,
    Loader\Plugin
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * View
 */
class View {
    /**
     * @param Plugin $parent_plugin
     * @param Plugin $child_plugin
     *
     * @return self
     */
    public static function create(
        Plugin $parent_plugin,
        Plugin $child_plugin,
    ): self {
        return new self(
            parent_plugin: $parent_plugin,
            child_plugin: $child_plugin,
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
     * @return void
     */
    public function render(): void {
        echo Template::create(filename: __DIR__ . '/templates/template')
            ->assign(names: 'parent_plugin', value: $this->parent_plugin)
            ->assign(names: 'child_plugin', value: $this->child_plugin)
            ->output()
        ;
    }
}
