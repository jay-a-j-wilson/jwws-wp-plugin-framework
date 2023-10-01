<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Function_Availability_Checker\Function_Availability_Checker;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Enums\Type;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\PHP_Factory as Confirmed_Filepath_Factory;

// Security::stop_direct_access();

/**
 * @source https://developer.wordpress.org/reference/functions/get_plugin_data
 */
final class Plugin_Data {
    public static function of(
        Confirmed_Filepath_Factory $factory,
        bool $markup = true,
        bool $translate = true,
    ): self {
        Function_Availability_Checker::new_instance()->ensure_available();

        return new self(
            data: get_plugin_data(
                plugin_file: $factory->create()->__toString(),
                markup: $markup,
                translate: $translate,
            ),
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly array $data) {}

    public function header(Type $type): string {
        return $this->data[$type->value];
    }
}
