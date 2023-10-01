<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory;

use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_PHP_Factory\Immediate_Dir_PHP_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;

// Security::stop_direct_access();

final class Basename_Factory {
    public static function of(string $path): self {
        return new self(
            path: $path
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $path) {}

    public function create(): Basename {
        return Basename::of(
            factory: Immediate_Dir_PHP_Factory::of(path: $this->path),
        );
    }
}
