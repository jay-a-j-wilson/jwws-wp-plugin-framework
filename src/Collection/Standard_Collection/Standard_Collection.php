<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security
};

// Security::stop_direct_access();

final class Standard_Collection implements Collection {
    public static function new_instance(): self {
        return new self();
    }

    public static function of(mixed ...$items): self {
        return new self(
            $items,
        );
    }

    /**
     * @return void
     */
    private function __construct(private array $items = []) {}

    public function add(mixed ...$items): self {
        foreach ($items as $item) {
            $this->items[] = $item;
        }

        return self::of(...$this->items);
    }

    public function clear(): self {
        return self::new_instance();
    }

    public function each(callable $callback): self {
        foreach ($this->items as $item) {
            $callback($item);
        }

        return $this;
    }

    public function map(callable $callback): self {
        return self::of(
            ...array_map(
                callback: $callback,
                array: $this->items,
            ),
        );
    }

    public function flatten(float $levels = INF): self {
        $result = [];

        foreach ($this->items as $item) {
            $result = [
                ...$result,
                ...(
                    \is_array(value: $item) && $levels > 0
                        ? self::of(...$item)
                            ->flatten(levels: $levels - 1)
                            ->to_array()
                        : [$item]
                ),
            ];
        }

        return self::of(...$result);
    }

    public function filter_by_value(callable $callback): self {
        return $this->filter(
            callback: $callback,
            mode: 0,
        );
    }

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

    public function reverse(): self {
        return self::of(
            ...array_reverse(
                array: $this->items,
                preserve_keys: true,
            ),
        );
    }

    public function pluck(mixed $key): self {
        return self::of(
            ...$this->map(
                fn (mixed $item): mixed => \is_object(value: $item)
                    ? $item->{$key}
                    : $item[$key],
            )
                ->to_array(),
        );
    }

    public function slice(int $offset, ?int $length = null): self {
        return self::of(
            ...\array_slice(
                array: $this->items,
                offset: $offset,
                length: $length,
                preserve_keys: true,
            ),
        );
    }

    public function is_empty(): bool {
        return empty($this->items);
    }

    public function contains_key(mixed $key): bool {
        return \array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    public function contains_value(mixed $value): bool {
        return \in_array(
            needle: $value,
            haystack: $this->items,
        );
    }

    public function to_array(): array {
        return $this->items;
    }

    public function implode(string $separator = ', '): string {
        return implode(
            separator: $separator,
            array: $this->items,
        );
    }

    public function count(): int {
        return \count(value: $this->items);
    }

    public function offsetExists(mixed $key): bool {
        return \array_key_exists(
            key: $key,
            array: $this->items,
        );
    }

    public function offsetGet(mixed $key): mixed {
        return $this->items[$key];
    }

    public function offsetSet(mixed $key, mixed $value): void {
        $key === null
            ? $this->items[] = $value
            : $this->items[$key] = $value;
    }

    public function offsetUnset(mixed $key): void {
        unset($this->items[$key]);
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator(
            array: $this->items,
        );
    }

    public function __toString(): string {
        return self::of(...$this->items)->flatten()->implode();
        // return implode(separator: ', ', array: $this->items);
    }
}
