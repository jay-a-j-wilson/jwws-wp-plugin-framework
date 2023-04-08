<?php

namespace JWWS\WPPF\WordPress\Terms\Product\Tags;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Terms\Abstract_Terms
};

Security::stop_direct_access();

/**
 */
final class Tags extends Abstract_Terms {
    /**
     * @var string
     */
    protected string $taxonomy = 'product_tag';
}
