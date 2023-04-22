<?php

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log,
};

Security::stop_direct_access();

/**
 */
final class Collection implements
    \Countable,
    \ArrayAccess,
    \IteratorAggregate {
    use Log;

    /**
     * @param mixed $items
     *
     * @return self
     */
    public static function of(mixed ...$items): self {
        return new self(
            $items,
        );
    }

    /**
     * @param array $items
     *
     * @return void
     */
    public function __construct(private array $items = []) {
    }

    /**
     * Adds an item to the collection.
     *
     * @param mixed $items
     *
     * @return self
     */
    public function add(mixed ...$items): self {
        foreach ($items as $item) {
            $this->items[] = $item;
        }

        return self::of(...$this->items);
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
     * @return self
     */
    public function map(callable $callback): self {
        return self::of(
            ...array_map(
                callback: $callback,
                array: $this->items,
            ),
        );
    }

    /**
     * @param callable $callback
     *
     * @return self
     */
    public function filter_by_value(callable $callback): self {
        return $this->filter(
            callback: $callback,
            mode: 0,
        );
    }

    /**
     * @param callable $callback
     *
     * @return self
     */
    public function filter_by_key(callable $callback): self {
        return $this->filter(
            callback: $callback,
            mode: ARRAY_FILTER_USE_KEY,
        );
    }

    /**
     * @param callable $callback
     * @param int      $mode
     *
     * @return self
     */
    private function filter(callable $callback, int $mode): self {
        return self::of(
            ...array_filter(
                array: $this->items,
                callback: $callback,
                mode: $mode,
            ),
        );
    }

    /**
     * Reverses items order.
     *
     * @return self
     */
    public function reverse(): self {
        return self::of(
            ...array_reverse(
                array: $this->items,
                preserve_keys: true,
            ),
        );
    }

    /**
     * Fetches the values of a given key.
     * Keys in objects must be public.
     *
     * @param mixed $key
     *
     * @return self
     */
    public function pluck(mixed $key): self {
        return self::of(
            ...$this->map(
                fn (mixed $item): mixed => is_object(value: $item)
                    ? $item->$key
                    : $item[$key],
            )
                ->to_array(),
        );
    }

    /**
     * Extracts a slice of the collection.
     *
     * @param int      $offset
     * @param int|null $length
     *
     * @return self
     */
    public function slice(int $offset, ?int $length = null): self {
        return self::of(
            ...array_slice(
                array: $this->items,
                offset: $offset,
                length: $length,
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
