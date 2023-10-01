<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Path_Info;
use JWWS\WPPF\Common\Value_Object\Value_Object;
// Security::stop_direct_access();

/**
 * Represents a filename.
 */
interface Name extends Value_Object {
    public static function of(Path_Info $path_info): self;
}
