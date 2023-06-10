<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Tests\Unit;

use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Dir\Dir,
    Sub_Value_Objects\File\File,
    Subclasses\Confirmed_Filepath\Confirmed_Filepath
};
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath
 *
 * @internal
 */
final class Of extends TestCase {
    private Stub|Dir $dir;

    private Stub|File $file;

    protected function setUp(): void {
        parent::setUp();

        $this->dir = self::createStub(originalClassName: Dir::class);
        $this->dir
            ->method('__toString')
            ->willReturn(value: __DIR__ . '/test_files/')
        ;

        $this->file = self::createStub(originalClassName: File::class);
    }

    /**
     * @test
     */
    public function pass(): void {
        $this->file
            ->method('__toString')
            ->willReturn(value: 'file_1.php')
        ;

        self::assertInstanceOf(
            expected: Confirmed_Filepath::class,
            actual: Confirmed_Filepath::of(
                dir: $this->dir,
                file: $this->file,
            ),
        );
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg not exist.
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);

        $this->file
            ->method('__toString')
            ->willReturn(value: $arg)
        ;

        self::assertInstanceOf(
            expected: Confirmed_Filepath::class,
            actual: Confirmed_Filepath::of(
                dir: $this->dir,
                file: $this->file,
            ),
        );
    }

    public static function throw_data_provider(): iterable {
        yield ['folder/foo.txt'];

        yield ['foo.txt'];

        yield ['bar.txt'];
    }
}
