<?php

namespace JWWS\WPPF\WordPress\Terms\Product_Tags;

use JWWS\WPPF\{
    Security\Security,
    WordPress\Terms\Abstract_Terms
};

Security::stop_direct_access();

/**
 */
final class Product_Tags extends Abstract_Terms {
    /**
     * @var string
     */
    protected string $taxonomy = 'product_tag';
}
