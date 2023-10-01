<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Factory\Name_Header_Factory;


// Security::stop_direct_access();

final class Name_Factory {
    public static function of(string $basename, string $fallback_name): static {
        return new self(
            basename: $basename,
            fallback_name: $fallback_name,
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private readonly string $basename,
        private readonly string $fallback_name
    ) {}

    public function create(): Name {
        return  Name::of(
            factory: Name_Header_Factory::of(basename: $this->basename),
            fallback_name: $this->fallback_name
        );
    }
}
