<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Tests\Integration;

use InvalidArgumentException;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory as Basename_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Filepath::class,
            actual: Filepath::of(
                dir: Dir::new_instance(),
                factory: Basename_Factory::of(path: 'dir/file.ext'),
            ),
        );
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(mixed $arg): void {
        self::expectException(exception: InvalidArgumentException::class);
        Filepath::of(
            dir: Dir::new_instance(),
            factory: Basename_Factory::of(path: $arg),
        );
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.ext'];

        yield 'no filename' => ['dir/.ext'];

        yield 'no dir, no filename' => ['.ext'];
    }
}
