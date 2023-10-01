<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name_Factory;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Path_Info;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Standard_Name;

// Security::stop_direct_access();

final class Standard_Name_Factory implements Name_Factory {
    public static function of(string $path): static {
        return new self(
            path: $path,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $path) {}

    public function create(): Name {
        return Standard_Name::of(
            path_info: Path_Info::of(path: $this->path),
        );
    }
}
