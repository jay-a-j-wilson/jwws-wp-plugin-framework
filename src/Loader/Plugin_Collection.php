<?php

namespace JWWS\WPPF\Loader;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Plugin_Collection {
    /**
     * Creates collection.
     *
     * @param Plugin $plugins
     *
     * @return self
     */
    public static function create(Plugin ...$plugins): self {
        return new self($plugins);
    }

    /**
     * @param Plugin[] $items
     */
    private function __construct(private array $items = []) {
    }

    /**
     * Adds a plugin to the collection.
     *
     * @param Plugin $plugins
     *
     * @retrun self for chaining
     */
    public function add(Plugin ...$plugins): self {
        foreach ($plugins as $plugin) {
            $this->items[] = $plugin;
        }

        return $this;
    }

    /**
     * Checks if collection contains plugin.
     *
     * @param string $plugin Path to plugin file relative to plugin's directory.
     *                       Example 'directory/filename.php'.
     *
     * @returns bool
     */
    public function includes(string $plugin): bool {
        foreach ($this->items as $item) {
            if ($plugin === $item->get_filename()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Gets all plugins in collection.
     *
     * @return array
     */
    public function get_all(): array {
        return $this->items;
    }

    /**
     * Has inactive plugin.
     *
     * @return bool
     */
    public function has_inactive(): bool {
        return $this->get_all_inactive()->count() > 0;
    }

    /**
     * Gets all inactive plugins in collection.
     *
     * @return self
     */
    public function get_all_inactive(): self {
        $inactive_items = new self();

        foreach ($this->items as $item) {
            if (! $item->is_active()) {
                $inactive_items->add($item);
            }
        }

        return $inactive_items;
    }

    /**
     * Returns number of plugins in collection.
     *
     * @param Plugin $plugin
     */
    public function count(): int {
        return count($this->items);
    }
}
