<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Basename_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;

// Security::stop_direct_access();

final class Filepath_Factory {
    public static function of(string $path): self {
        return new self(path: $path);
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $path) {}

    public function create(): Filepath {
        return Filepath::of(
            dir: Dir::new_instance(),
            factory: Basename_Factory::of(path: $this->path),
        );
    }
}
