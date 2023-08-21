<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\CSS_File;
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

    public function create(): CSS_File {
        return CSS_File::of(path: Standard_Name::of(path: $this->path));
    }
}
