<?php

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log,
};

Security::stop_direct_access();

/**
 * @template T
 */
class Collection implements
    \Countable,
    \ArrayAccess,
    \IteratorAggregate {
    use Log;

    /**
     * @param array<T> $items
     *
     * @return static
     */
    public static function of(array $items): static {
        return new static(
            items: $items,
        );
    }

    /**
     * @param array<T> $items
     *
     * @return void
     */
    public function __construct(private array $items) {
    }

    /**
     * Adds an item to the collection.
     *
     * @param T $item
     *
     * @return self
     */
    public function add(mixed $item): self {
        $this->items[] = $item;

        return $this;
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
     * Determines if the collection is empty or not.
     *
     * @return bool
     */
    public function is_empty(): bool {
        return empty($this->items);
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
     * @param string $separator
     *
     * @return string
     */
    public function to_string(string $separator = ', '): string {
        return implode(
            separator: $separator,
            array: $this->items,
        );
    }

    /**
     * @return int
     */
    public function count(): int {
        return count(value: $this->items);
    }

    /**
     * Determines if an item exists at an offset.
     *
     * @param mixed $key
     *
     * @return bool
     */
    public function offsetExists(mixed $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    /**
     * Gets an item at a given offset.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function offsetGet(mixed $key): mixed {
        return $this->items[$key];
    }

    /**
     * Sets the item at a given offset.
     *
     * @param mixed $value
     * @param mixed $key
     *
     * @return void
     */
    public function offsetSet(mixed $key, mixed $value): void {
        is_null(value: $key)
            ? $this->items[]     = $value
            : $this->items[$key] = $value;
    }

    /**
     * Unsets the item at a given offset.
     *
     * @param mixed $key
     *
     * @return void
     */
    public function offsetUnset(mixed $key): void {
        unset($this->items[$key]);
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
