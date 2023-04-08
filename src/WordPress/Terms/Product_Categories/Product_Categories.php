<?php

namespace JWWS\WPPF\WordPress\Terms\Product_Categories;

use JWWS\WPPF\{
    Security\Security,
    WordPress\Terms\Abstract_Terms
};

Security::stop_direct_access();

/**
 */
final class Product_Categories extends Abstract_Terms {
    /**
     * @var string
     */
    protected string $taxonomy = 'product_cat';
}
