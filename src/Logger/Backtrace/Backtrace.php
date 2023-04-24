<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 *
 * ! integrate.
 */
final class Backtrace {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self(
            stack_frames: Collection::of(
                items: debug_backtrace(),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private Collection $stack_frames) {
    }

    /**
     * Undocumented function.
     */
    public function get_stack_frames(): Collection {
        return $this->stack_frames;
    }
}
