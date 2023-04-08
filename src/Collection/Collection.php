<?php

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Traits\Log\Log,
    Logger\Error_Logger\Error_Logger,
    Security\Security
};

Security::stop_direct_access();

/**
 * @package JWWS\ACA
 */
class Collection implements \Countable, \ArrayAccess, \IteratorAggregate {
    use Log;

    /**
     * @param array $items
     *
     * @return static
     */
    public static function create_from(array $items): static {
        return new static(
            items: $items,
        );
    }

    /**
     * @param array $items
     *
     * @return void
     */
    public function __construct(private array $items) {
    }

    /**
     * @return int
     */
    public function count(): int {
        return count(value: $this->items);
    }

    /**
     * Adds an item to the collection.
     *
     * @param mixed $item
     *
     * @return $this
     */
    public function add(mixed $item) {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Reverses items order.
     *
     * @return static
     */
    public function reverse(): static {
        return new static(
            items: array_reverse(
                array: $this->items,
                preserve_keys: true,
            ),
        );
    }

    /**
     * Determines if the collection is empty or not.
     *
     * @return bool
     */
    public function is_empty(): bool {
        return empty($this->items);
    }

    /**
     * Fetches the values of a given key.
     *
     * @param mixed $key
     *
     * @return self
     */
    public function pluck(mixed $key): static {
        return new static(
            items: array_column(
                array: $this->items,
                column_key: $key,
            ),
        );
    }

    /**
     * @param callable $callback
     *
     * @return self
     */
    public function each(callable $callback): self {
        foreach ($this->items as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function map(callable $callback): static {
        return new static(
            items: array_map(
                callback: $callback,
                array: $this->items,
            ),
        );
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function filter_by_value(callable $callback): static {
        return $this->filter(
            callback: $callback,
            mode: 0,
        );
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function filter_by_key(callable $callback): static {
        return $this->filter(
            callback: $callback,
            mode: ARRAY_FILTER_USE_KEY,
        );
    }

    /**
     * @param callable $callback
     * @param int      $mode
     *
     * @return static
     */
    private function filter(callable $callback, int $mode): static {
        return new static(
            items: array_filter(
                array: $this->items,
                callback: $callback,
                mode: $mode,
            ),
        );
    }

    /**
     * @param mixed $key
     *
     * @return bool
     */
    public function contains_key(mixed $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    /**
     * @param mixed $key
     * @param mixed $value
     *
     * @return bool
     */
    public function contains_value(mixed $value): bool {
        return in_array(
            needle: $value,
            haystack: $this->items,
        );
    }

    /**
     * @return array
     */
    public function to_array(): array {
        return $this->items;
    }

    /**
     * Determines if an item exists at an offset.
     *
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool {
        return array_key_exists(
            key: $offset,
            array: $this->items,
        );
    }

    /**
     * Gets an item at a given offset.
     *
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed {
        return $this->items[$offset];
    }

    /**
     * Sets the item at a given offset.
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void {
        is_null(value: $offset)
            ? $this->items[]        = $value
            : $this->items[$offset] = $value;
    }

    /**
     * Unsets the item at a given offset.
     *
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void {
        unset($this->items[$offset]);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator(
            array: $this->items,
        );
    }
}
