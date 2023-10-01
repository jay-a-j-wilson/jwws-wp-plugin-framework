<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Factory\Standard_Name_Factory;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Standard_Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Factory\Standard_Name_Factory
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
            expected: Standard_Name::class,
            actual: Standard_Name_Factory::of(path: $arg)->create(),
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
        Standard_Name_Factory::of(path: $arg)->create();
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];
    }
}
