<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security
};

Security::stop_direct_access();

/**
 * ! intergrate.
 */
final class Backtrace {
    /**
     * @return self
     */
    public static function create(): self {
        return new self(
            stack_frames: Collection::of(
                items: debug_backtrace(),
            ),
        );
    }

    /**
     * @param Collection $stack_frames
     */
    private function __construct(private Collection $stack_frames) {
    }

    /**
     * @return Collection
     */
    public function get_stack_frames(): Collection {
        return $this->stack_frames;
    }
}
