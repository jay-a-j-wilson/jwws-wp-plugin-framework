<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\PHP_Factory;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Tests\Fixtures\Fixture;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\PHP_Factory
 *
 * @internal
 *
 * @small
 */
final class Create extends Fixture {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Tests\Data_Provider::files
     *
     * @testdox pass[$_dataName] => arg $arg
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: Confirmed_Filepath::class,
            actual: PHP_Factory::of($this->full_path(path: $arg))->create(),
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
        PHP_Factory::of(path: $arg)->create();
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];
    }
}
