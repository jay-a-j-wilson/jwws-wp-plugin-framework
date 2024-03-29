<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory\Filepath_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory\Factory
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
            expected: Filepath::class,
            actual: Filepath_Factory::of(path: 'dir/file.ext')->create(),
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
        Filepath_Factory::of(path: $arg)->create();
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.txt'];

        yield 'no file' => ['dir/.txt'];
    }
}
