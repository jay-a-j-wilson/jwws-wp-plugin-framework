<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\CSS_File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Factory\Standard_Name_Factory;

// Security::stop_direct_access();

final class CSS_File_Factory {
    public static function of(string $path): static {
        return new self(
            path: $path,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $path) {}

    public function create(): CSS_File {
        return CSS_File::of(
            factory: Standard_Name_Factory::of(path: $this->path)
        );
    }
}
