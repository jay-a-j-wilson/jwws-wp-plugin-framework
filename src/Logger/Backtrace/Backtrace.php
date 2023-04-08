<?php

namespace JWWS\WPPF\Logger\Backtrace;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
final class Backtrace {
    /**
     * @return self
     */
    public static function create(): self {
        return new self(
            stack_frames: debug_backtrace(),
        );
    }

    /**
     * @param array $stack_frames
     */
    private function __construct(private array $stack_frames) {
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
    private function filter(callable $callback, int $mode): self {
        return new self(
            stack_frames: array_filter(
                array: $this->stack_frames,
                callback: $callback,
                mode: $mode,
            ),
        );
    }

    /**
     * @param mixed $key
     *
     * @return self
     */
    public function pluck(mixed $key): self {
        return new self(
            stack_frames: array_column(
                array: $this->stack_frames,
                column_key: $key,
            ),
        );
    }

    /**
     * @return $this
     */
    public function log(): self {
        $object = print_r(
            value: $this,
            return: true,
        );

        $separator = str_repeat(string: '=', times: 200);

        error_log(message: "\n{$separator}\n\n{$object}\n{$separator}");

        return $this;
    }
}
