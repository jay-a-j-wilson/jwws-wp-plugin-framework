<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 *
 * @small
 */
final class Render_Dependencies extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(Plugin $arg_1, string $arg_2): void {
        self::expectOutputString(expectedString: $arg_1->render_dependencies());
        echo $arg_2;
    }

    public static function pass_data_provider(): iterable {
        $prefix = '<strong>Requires:</strong> ';

        yield 'none' => [
            Basic_Plugin_Factory::create_and_get(),
            '',
        ];

        yield 'single: basic' => [
            Basic_Plugin_Factory::create_and_get()
                ->add_dependencies(plugins: Basic_Plugin_Factory::create_and_get()),
            "{$prefix}Plugin",
        ];

        yield 'single: akismet' => [
            Basic_Plugin_Factory::create_and_get()
                ->add_dependencies(plugins: Akismet_Plugin_Factory::create_and_get()),
            "{$prefix}Akismet Anti-Spam: Spam Protection",
        ];

        yield 'multiple' => [
            Basic_Plugin_Factory::create_and_get()
                ->add_dependencies(
                    Basic_Plugin_Factory::create_and_get(),
                    Akismet_Plugin_Factory::create_and_get(),
                ),
            "{$prefix}Plugin, Akismet Anti-Spam: Spam Protection",
        ];

        yield 'multiple: reverse' => [
            Basic_Plugin_Factory::create_and_get()
                ->add_dependencies(
                    Akismet_Plugin_Factory::create_and_get(),
                    Basic_Plugin_Factory::create_and_get(),
                ),
            "{$prefix}Akismet Anti-Spam: Spam Protection, Plugin",
        ];
    }
}
