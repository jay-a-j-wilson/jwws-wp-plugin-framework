<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Tests\Integrated;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_PHP_Factory\Immediate_Dir_PHP_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: Basename::class,
            actual: Basename::of(
                factory: Immediate_Dir_PHP_Factory::of(path: $arg),
            ),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir/file.ext'];

        yield 'parent dir' => ['dir/dir/file.ext'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        self::expectException(exception: InvalidArgumentException::class);
        Basename::of(factory: Immediate_Dir_PHP_Factory::of(path: $arg));
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.ext'];

        yield 'no filename' => ['dir/.ext'];

        yield 'no dir, no filename' => ['.ext'];
    }
}
