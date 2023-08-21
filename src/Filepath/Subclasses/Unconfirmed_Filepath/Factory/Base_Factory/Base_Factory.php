<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory;

use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;

// Security::stop_direct_access();

abstract class Base_Factory implements Factory {
    final public static function of(string $path): static {
        return new static(
            path: $path
        );
    }

    /**
     * @return void
     */
    private function __construct(protected readonly string $path) {}

    abstract public function create(): Unconfirmed_Filepath;
}
