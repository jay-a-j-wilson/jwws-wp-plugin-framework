<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\PHP_Ext;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

// #[CoversClass(PHP_Ext::class)]
/**
 * @covers PHP_Ext
 */
final class Of extends TestCase {
    // #[Test]
    // #[TestDox('Valid path $path ends in "php".')]
    // #[TestWith(data: ['file.php'])]
    // #[TestWith(data: ['dir/file.php'])]
    // #[TestWith(data: ['dir/subdir/file.php'])]

    /**
     * @test
     *
     * @testdox Valid path $path ends in "php".
     *
     * @testWith
     * ["file.php"]
     * ["dir/file.php"]
     * ["dir/subdir/file.php"]
     */
    public function pass(mixed $path): void {
        $this->assertEquals(
            expected: 'php',
            actual: PHP_Ext::of(path: $path),
        );
    }

    // #[Test]
    // #[TestDox('Invalid path $path does not end in "php".')]
    // #[TestWith(data: [''])]
    // #[TestWith(data: ['file.css'])]
    // #[TestWith(data: ['dir/file.html'])]
    // #[TestWith(data: ['dir/subdir/file.js'])]

    /**
     * @test
     *
     * @testdox 'Invalid path $path does not end in "php".'
     *
     * @testWith
     * [""]
     * ["file.css"]
     * ["dir/file.html"]
     * ["dir/subdir/file.js"]
     */
    public function throw(mixed $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        PHP_Ext::of(path: $path);
    }
}
