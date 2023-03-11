<?php

namespace JWWS\WPPF\Loader\Plugin;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin_Collection_Iterator.
 */
class Plugin_Collection_Iterator implements \Iterator {
    /**
     * @param Plugin_Collection $collection
     * @param bool              $is_reverse
     *
     * @return self
     */
    public static function create(
        Plugin_Collection $collection,
        bool $is_reverse = false,
    ): self {
        return new self(
            collection: $collection,
            is_reverse: $is_reverse,
        );
    }

    /**
     * @param Plugin_Collection $collection
     * @param bool              $is_reverse
     */
    private function __construct(
        private Plugin_Collection $collection,
        private bool $is_reverse,
    ) {
    }

    /**
     * @var int
     */
    private int $position = 0;

    /**
     * @return void
     */
    public function rewind(): void {
        $this->position = $this->is_reverse
            ? $this->collection->count() - 1
            : 0;
    }

    /**
     * @return Plugin
     */
    public function current(): Plugin {
        return $this->collection->get_by_key(key: $this->position);
    }

    /**
     * @return int
     */
    public function key(): int {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next(): void {
        $this->position = $this->position + ($this->is_reverse ? -1 : 1);
    }

    /**
     * @return bool
     */
    public function valid(): bool {
        return ! is_null(
            value: $this->collection->get_by_key(
                key: $this->position,
            ),
        );
    }
}
