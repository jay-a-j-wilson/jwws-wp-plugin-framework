<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Filepath;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Factory;
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
     * @xtest
     */
    public function pass(): void {
        $x = $this->createMock(
            originalClassName: Filepath::class,
        );
        $stub = $this->createMock(
            originalClassName: Factory::class,
        );
        $stub->method('create')
            ->will($this->returnValue($x))
        ;

        self::assertInstanceOf(
            expected: Basename::class,
            actual: Basename::of(factory: $stub),
        );
    }

    /**
     * @xtest
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(mixed $arg): void {
        self::expectException(exception: InvalidArgumentException::class);
        // Basename::of(basename: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.ext'];

        yield 'no filename' => ['dir/.ext'];

        yield 'no dir, no filename' => ['.ext'];
    }
}
