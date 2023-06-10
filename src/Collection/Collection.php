<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

interface Collection extends
    \ArrayAccess,
    \Countable,
    \IteratorAggregate,
    \Stringable {
    /**
     * Factory method.
     */
    public static function create(): self;

    /**
     * Factory method.
     */
    public static function of(mixed ...$items): self;

    /**
     * Adds an item to the collection.
     */
    public function add(mixed ...$items): self;

    /**
     * Clears all items from the collection.
     */
    public function clear(): self;

    public function each(callable $callback): self;

    /**
     * Applies the callback to the elements of the collection.
     */
    public function map(callable $callback): self;

    /**
     * Flattens the collection.
     */
    public function flatten(float $levels = INF): self;

    public function filter_by_value(callable $callback): self;

    public function filter_by_key(callable $callback): self;

    /**
     * Reverses items order.
     */
    public function reverse(): self;

    /**
     * Fetches the values of a given key.
     *
     * Keys in objects must be public.
     */
    public function pluck(mixed $key): self;

    /**
     * Extracts a slice of the collection.
     */
    public function slice(int $offset, ?int $length = null): self;

    /**
     * Determines if the collection is empty or not.
     */
    public function is_empty(): bool;

    /**
     * Checks if the given key or index exists in the collection.
     */
    public function contains_key(mixed $key): bool;

    /**
     * Checks if a value exists in the collection.
     */
    public function contains_value(mixed $value): bool;

    /**
     * Converts collection to an array type variable.
     */
    public function to_array(): array;

    /**
     * Joins collection elements with a string.
     */
    public function implode(string $separator = ', '): string;

    /**
     * Counts all elements in the collection.
     */
    public function count(): int;

    /**
     * {@inheritDoc}
     *
     * Determines if an item exists at an offset.
     */
    public function offsetExists(mixed $key): bool;

    /**
     * {@inheritDoc}
     *
     * Gets an item at a given offset.
     */
    public function offsetGet(mixed $key): mixed;

    /**
     * {@inheritDoc}
     *
     * Sets the item at a given offset.
     */
    public function offsetSet(mixed $key, mixed $value): void;

    /**
     * {@inheritDoc}
     *
     * Unsets the item at a given offset.
     */
    public function offsetUnset(mixed $key): void;

    public function getIterator(): \ArrayIterator;

    /**
     * {@inheritDoc}
     *
     * Returns as comma separated list: `a, b, c, d`
     */
    public function __toString(): string;
}
