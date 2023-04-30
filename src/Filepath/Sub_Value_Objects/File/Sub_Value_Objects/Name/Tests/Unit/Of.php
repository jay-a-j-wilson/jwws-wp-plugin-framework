<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

// #[CoversClass(Name::class)]
/**
 * @covers Name
 */
final class Of extends TestCase {
    // #[Test]
    // #[TestDox('Valid filename $path is "file".')]
    // #[TestWith(data: ['file.php'])]
    // #[TestWith(data: ['dir/file.php'])]
    // #[TestWith(data: ['dir/subdir/file.php'])]

    /**
     * @test
     *
     * @testdox 'Valid filename $path is "file".'
     *
     * @testWith
     * ["file.php"]
     * ["dir/file.php"]
     * ["dir/subdir/file.php"]
     */
    public function pass(mixed $path): void {
        $this->assertEquals(
            expected: 'file',
            actual: Name::of(path: $path),
        );
    }

    // #[Test]
    // #[TestDox('Invalid filename $path is not "file".')]
    // #[TestWith(data: [''])]
    // #[TestWith(data: ['.php'])]
    // #[TestWith(data: ['dir/.html'])]
    // #[TestWith(data: ['dir/subdir/.js'])]

    /**
     * @test
     *
     * @testdox 'Invalid filename $path is not "file".'
     *
     * @testWith
     * [""]
     * [".php"]
     * ["dir/.html"]
     * ["dir/subdir/.js"]
     */
    public function throw(mixed $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Name::of(path: $path);
    }
}
