<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Unit;

use JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init;
use JWWS\WPPF\Loader\Plugin\Plugin;
use PHPUnit\Framework\MockObject\Rule\InvokedCount;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 *
 * @small
 */
final class Callback extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(bool $arg_1, InvokedCount $arg_2): void {
        $dependency = self::createMock(originalClassName: Plugin::class);

        $dependency
            ->expects(self::once())
            ->method(constraint: 'can_activate')
            ->willReturn(value: $arg_1)
        ;

        $dependency
            ->expects($arg_2)
            ->method(constraint: 'deactivate')
        ;

        Admin_Init::of(plugin: $dependency)->callback();
    }

    public static function pass_data_provider(): iterable {
        yield 'true' => [
            true,
            self::never(),
        ];

        yield 'false' => [
            false,
            self::once(),
        ];
    }
}
