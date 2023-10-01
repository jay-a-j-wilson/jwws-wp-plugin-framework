<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory;

use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\PHP_Factory as Confirmed_Filepath_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory\Filepath_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Plugin_Data;

// Security::stop_direct_access();

final class Plugin_Data_Factory {
    public static function of(string $basename): static {
        return new self(
            basename: $basename,
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly string $basename) {}

    public function create(): Plugin_Data {
        return Plugin_Data::of(
            factory: Confirmed_Filepath_Factory::of(
                path: Filepath_Factory::of(path: $this->basename)
                    ->create()
                    ->__toString(),
            )
        );
    }
}
