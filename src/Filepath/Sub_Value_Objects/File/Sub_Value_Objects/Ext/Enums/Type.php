<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Enums;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * File extension types.
 */
enum Type: string {
    case PHP = 'php';

    case HTML = 'html';

    case JS = 'js';

    case CSS = 'css';
}
