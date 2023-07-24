<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Tests\Integration;

use JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices;
use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Akismet_Plugin_Factory;
use JWWS\WPPF\Loader\Tests\Integration\Fixtures\Basic_Plugin_Factory;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices
 *
 * @internal
 *
 * @small
 */
final class Callback extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(Plugin $arg_1, Plugin $arg_2): void {
        self::expectOutputString(
            expectedString: self::render(plugin: $arg_1, dependency: $arg_2),
        );

        echo Admin_Notices::of(plugin: $arg_1, dependency: $arg_2)->callback();
    }

    private function render(Plugin $plugin, Plugin $dependency): string {
        return <<<EOD
<div class="notice notice-error">
    <p>
        Sorry, the
        <strong>{$plugin->name()}</strong>
        plugin needs the
        <strong>{$dependency->name()}</strong>
        plugin to be installed and activated.
    </p>
</div>
EOD;
    }

    public static function pass_data_provider(): iterable {
        yield 'basic deps akismet' => [
            Akismet_Plugin_Factory::create_and_get(),
            Basic_Plugin_Factory::create_and_get(),
        ];

        yield 'akismet deps basic' => [
            Basic_Plugin_Factory::create_and_get(),
            Akismet_Plugin_Factory::create_and_get(),
        ];
    }
}
