<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\CSS_File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Factory\Factory
 *
 * @internal
 *
 * @small
 */
final class Create extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: CSS_File::class,
            actual: Factory::of(path: $arg)->create(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir/file.ext'];
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
    }
}
