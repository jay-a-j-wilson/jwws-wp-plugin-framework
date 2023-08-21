<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory
 *
 * @internal
 *
 * @small
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Basename::class,
            actual: Factory::of(path: 'dir/file.ext')->create(),
        );
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: InvalidArgumentException::class);
        Factory::of(path: $arg)->create();
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.txt'];

        yield 'no file' => ['dir/.txt'];
    }
}
