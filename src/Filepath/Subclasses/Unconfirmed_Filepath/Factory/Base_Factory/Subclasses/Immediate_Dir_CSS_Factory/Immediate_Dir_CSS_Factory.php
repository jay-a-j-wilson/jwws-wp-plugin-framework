<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_CSS_Factory;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Immediate_Dir\Immediate_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\CSS_File_Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Base_Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;

// Security::stop_direct_access();

final class Immediate_Dir_CSS_Factory extends Base_Factory {
    public function create(): Unconfirmed_Filepath {
        return Unconfirmed_Filepath::of(
            dir: Immediate_Dir::of(path: $this->path),
            file: CSS_File_Factory::of(path: $this->path)->create(),
        );
    }
}
