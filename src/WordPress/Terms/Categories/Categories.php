<?php

namespace JWWS\WPPF\WordPress\Terms\Categories;

use JWWS\WPPF\{
    Security\Security,
    WordPress\Terms\Abstract_Terms
};

Security::stop_direct_access();

/**
 */
final class Categories extends Abstract_Terms {
    /**
     * @var string
     */
    protected string $taxonomy = 'category';
}
