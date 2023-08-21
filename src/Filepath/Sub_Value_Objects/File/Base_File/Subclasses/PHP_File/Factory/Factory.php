<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Standard_Name;

// Security::stop_direct_access();

final class Factory {
    public static function of(string $path): static {
        return new self(
            path: $path,
        );
    }

    /**
     * @return void
     */
    private function __construct(protected readonly string $path) {}

    public function create(): PHP_File {
        return PHP_File::of(path: Standard_Name::of(path: $this->path));
    }
}
