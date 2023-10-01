<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Factory;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Plugin_Data_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Description_Header;

// Security::stop_direct_access();

final class Description_Header_Factory {
    public static function of(string $basename): static {
        return new self(
            basename: $basename,
        );
    }

    /**
     * @return void
     */
    private function __construct(protected readonly string $basename) {}

    public function create(): Description_Header {
        return Description_Header::of(
            factory: Plugin_Data_Factory::of(basename: $this->basename),
        );
    }
}
