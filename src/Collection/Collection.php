<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log,
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Collection implements
    \ArrayAccess,
    \Countable,
    \IteratorAggregate,
    \Stringable {
    use Log;

    /**
     * Factory method.
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Factory method.
     */
    public static function of(mixed ...$items): self {
        return new self(
            $items,
        );
    }

    /**
     * @return void
     */
    private function __construct(private array $items = []) {
    }

    /**
     * Adds an item to the collection.
     */
    public function add(mixed ...$items): self {
        foreach ($items as $item) {
            $this->items[] = $item;
        }

        return self::of(...$this->items);
    }

    /**
     * Clears all items from the collection.
     */
    public function clear(): self {
        return self::create();
    }

    /**
     * Undocumented function.
     */
    public function each(callable $callback): self {
        foreach ($this->items as $item) {
            $callback($item);
        }

        return $this;
    }

    /**
     * Applies the callback to the elements of the collection.
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
     * Flattens the collection.
     */
    public function flatten(float $levels = INF): self {
        $result = [];

        foreach ($this->items as $item) {
            $result = [
                ...$result,
                ...(
                    is_array(value: $item) && $levels > 0
                        ? self::of(...$item)
                            ->flatten(levels: $levels - 1)
                            ->to_array()
                        : [$item]
                ),
            ];
        }

        return self::of(...$result);
    }

    /**
     * Undocumented function.
     */
    public function filter_by_value(callable $callback): self {
        return $this->filter(
            callback: $callback,
            mode: 0,
        );
    }

    /**
     * Undocumented function.
     */
    public function filter_by_key(callable $callback): self {
        return $this->filter(
            callback: $callback,
            mode: ARRAY_FILTER_USE_KEY,
        );
    }

    /**
     * Iterates over each value in the collection passing them to the callback
     * function.
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
     *
     * Keys in objects must be public.
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
     */
    public function is_empty(): bool {
        return empty($this->items);
    }

    /**
     * Checks if the given key or index exists in the collection.
     */
    public function contains_key(mixed $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    /**
     * Checks if a value exists in the collection.
     */
    public function contains_value(mixed $value): bool {
        return in_array(
            needle: $value,
            haystack: $this->items,
        );
    }

    /**
     * Converts collection to an array type variable.
     */
    public function to_array(): array {
        return $this->items;
    }

    /**
     * Joins collection elements with a string.
     */
    public function implode(string $separator = ', '): string {
        return implode(
            separator: $separator,
            array: $this->items,
        );
    }

    /**
     * Counts all elements in the collection.
     */
    public function count(): int {
        return count(value: $this->items);
    }

    /**
     * Determines if an item exists at an offset.
     */
    public function offsetExists(mixed $key): bool {
        return array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    /**
     * Gets an item at a given offset.
     */
    public function offsetGet(mixed $key): mixed {
        return $this->items[$key];
    }

    /**
     * Sets the item at a given offset.
     */
    public function offsetSet(mixed $key, mixed $value): void {
        is_null(value: $key)
            ? $this->items[]     = $value
            : $this->items[$key] = $value;
    }

    /**
     * Unsets the item at a given offset.
     */
    public function offsetUnset(mixed $key): void {
        unset($this->items[$key]);
    }

    /**
     * Undocumented function.
     */
    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator(
            array: $this->items,
        );
    }

    /**
     * {@inheritDoc}
     *
     * Returns as comma separated list: `a, b, c, d`
     */
    public function __toString(): string {
        return self::of(...$this->items)->flatten()->implode();
        // return implode(separator: ', ', array: $this->items);
    }
}
