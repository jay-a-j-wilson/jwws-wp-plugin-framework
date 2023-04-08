<?php

namespace JWWS\WPPF\WordPress\Terms\Tags;

use JWWS\WPPF\{
    Security\Security,
    WordPress\Terms\Abstract_Terms
};

Security::stop_direct_access();

/**
 */
final class Tags extends Abstract_Terms {
    /**
     * @var string
     */
    protected string $taxonomy = 'post_tag';
}
