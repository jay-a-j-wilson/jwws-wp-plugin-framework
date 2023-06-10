<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Enums;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * File extensions.
 */
enum Ext: string {
    case PHP = 'php';

    case HTML = 'html';

    case JS = 'js';

    case CSS = 'css';
}
