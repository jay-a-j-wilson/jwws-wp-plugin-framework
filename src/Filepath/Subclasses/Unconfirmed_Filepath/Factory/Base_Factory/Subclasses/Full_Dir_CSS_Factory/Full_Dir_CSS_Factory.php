<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Full_Dir_CSS_Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\Factory as CSS_File_Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Base_Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;

// Security::stop_direct_access();

final class Full_Dir_CSS_Factory extends Base_Factory {
    public function create(): Unconfirmed_Filepath {
        return Unconfirmed_Filepath::of(
            dir: Full_Dir::of(path: $this->path),
            file: CSS_File_Factory::create(path: $this->path),
        );
    }
}
