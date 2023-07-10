<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta\Enums;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Object metadata types.
 *
 * @link https://developer.wordpress.org/reference/functions/get_metadata/
 */
enum Type: string {
    case POST = 'post';

    case COMMENT = 'comment';

    case TERM = 'term';

    case USER = 'user';
}
