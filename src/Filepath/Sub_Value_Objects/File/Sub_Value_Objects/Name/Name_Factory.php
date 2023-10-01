<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;

// Security::stop_direct_access();

interface Name_Factory {
    public static function of(string $path): self;

    public function create(): Name;
}
