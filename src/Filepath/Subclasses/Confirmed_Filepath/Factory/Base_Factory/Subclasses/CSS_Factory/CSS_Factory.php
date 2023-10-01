<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\CSS_Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\CSS_File_Factory;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Base_Factory;

// Security::stop_direct_access();

final class CSS_Factory extends Base_Factory {
    public function create(): Confirmed_Filepath {
        return Confirmed_Filepath::of(
            dir: Full_Dir::of(path: $this->path),
            file: CSS_File_Factory::of(path: $this->path)->create(),
        );
    }
}
