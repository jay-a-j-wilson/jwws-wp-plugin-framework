<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta;

use JWWS\WPPF\WordPress\Meta\Enums\Type;
use JWWS\WPPF\WordPress\Meta\Meta;

// Security::stop_direct_access();

final class Post_Meta extends Meta {
    protected static function meta_type(): Type {
        return Type::POST;
    }
}
