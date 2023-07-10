<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta\Subclasses\Term_Meta;

use JWWS\WPPF\{
    WordPress\Meta\Enums\Type,
    WordPress\Meta\Meta
};

// Security::stop_direct_access();

final class Term_Meta extends Meta {
    protected static function meta_type(): Type {
        return Type::TERM;
    }
}
