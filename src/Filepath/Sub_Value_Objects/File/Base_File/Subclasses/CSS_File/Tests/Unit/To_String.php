<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\CSS_File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\CSS_File\CSS_File
 *
 * @internal
 *
 * @small
 */
final class To_String extends TestCase {
    /**
     * ! Fix nested stubbing
     * @xtest
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        $stub = $this->createStub(originalClassName: Name_Factory::class);
        $stub
            ->method('__toString')
            ->willReturn(value: $arg)
        ;

        self::assertSame(
            expected: $expected,
            actual: CSS_File::of(factory: $stub)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            'filename',
            'filename.css',
        ];

        // yield 'basic' => ['filename.css'];

        // yield 'no ext' => ['filename'];

        // yield 'nested dir' => ['dir/sub_dir/filename.css'];

        // yield 'nested dir, dif ext' => ['dir/sub_dir/filename.php'];
    }
}
