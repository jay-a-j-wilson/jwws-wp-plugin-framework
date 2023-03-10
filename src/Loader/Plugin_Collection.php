<?php

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\Logger;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin_Collection.
 */
class Plugin_Collection implements \IteratorAggregate {
    /**
     * Creates collection.
     *
     * @param Plugin $plugins
     *
     * @return self
     */
    public static function create(Plugin ...$plugins): self {
        return new self(
            items: $plugins,
        );
    }

    /**
     * @param Plugin[] $items
     */
    private function __construct(private array $items = []) {
    }

    /**
     * Logs object.
     *
     * @return self for chaining
     */
    public function log(): self {
        Logger::error_log(output: $this, depth: 2);

        return $this;
    }

    /**
     */
    public function getIterator(): Plugin_Collection_Iterator {
        return new Plugin_Collection_Iterator(
            collection: $this,
        );
    }

    /**
     */
    public function getReverseIterator(): Plugin_Collection_Iterator {
        return new Plugin_Collection_Iterator(
            collection: $this,
            is_reverse: true,
        );
    }

    /**
     * Gets a plugin by its key in the collection.
     *
     * @param string $key
     *
     * @return ?Plugin
     */
    public function get_by_key(string $key): ?Plugin {
        return $this->items[$key] ?? null;
    }

    /**
     * Gets a plugin by its filename.
     *
     * @param string $filename Example 'directory/filename.php'.
     *
     * @return ?Plugin
     */
    public function get_by_filename(string $filename): ?Plugin {
        return array_pop(
            array: array_filter(
                array: $this->items,
                callback: fn ($item) => $item->get_filename() === $filename,
            ),
        );
    }

    /**
     * Returns number of plugins in collection.
     *
     * @param Plugin $plugin
     */
    public function count(): int {
        return count($this->items);
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

        return self::create(...$this->items);
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
        return ! is_null(value: $this->get_by_filename(filename: $plugin));
    }

    /**
     * Has inactive plugin.
     *
     * @return bool
     */
    public function has_inactive(): bool {
        return $this->get_inactive()->count() > 0;
    }

    /**
     * Gets all inactive plugins in collection.
     *
     * @return self
     */
    public function get_inactive(): self {
        return self::create(
            ...array_filter(
                array: $this->items,
                callback: fn (Plugin $item) => ! $item->is_active(),
            ),
        );
    }
}
