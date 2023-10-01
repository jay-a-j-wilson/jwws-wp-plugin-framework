<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory;

use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Confirmed_Filepath_Factory;

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 */
abstract class Base_Factory implements Confirmed_Filepath_Factory {
    final public static function of(string $path): static {
        return new static(
            path: $path,
        );
    }

    /**
     * @return void
     */
    private function __construct(protected readonly string $path) {}

    abstract public function create(): Confirmed_Filepath;
}
