<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory;

use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;

// Security::stop_direct_access();

interface Confirmed_Filepath_Factory {
    public static function of(string $path): self;

    public function create(): Confirmed_Filepath;
}
