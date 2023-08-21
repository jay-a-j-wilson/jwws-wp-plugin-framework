<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory;

use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;

// Security::stop_direct_access();

interface Factory {
    public static function of(string $path): self;

    public function create(): Unconfirmed_Filepath;
}
