<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\CSS_Ext\CSS_Ext;
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
    // #[TestDox('Valid path $path ends in "css".')]
    // #[TestWith(data: ['file.css'])]
    // #[TestWith(data: ['dir/file.css'])]
    // #[TestWith(data: ['dir/subdir/file.css'])]

    /**
     * @test
     *
     * @testdox Valid path $path ends in "css".
     *
     * @testWith
     * ["file.css"]
     * ["dir/file.css"]
     * ["dir/subdir/file.css"]
     */
    public function pass(mixed $path): void {
        $this->assertEquals(
            expected: 'css',
            actual: CSS_Ext::of(path: $path),
        );
    }

    // #[Test]
    // #[TestDox('Invalid path $path does not end in "css".')]
    // #[TestWith(data: [''])]
    // #[TestWith(data: ['file.php'])]
    // #[TestWith(data: ['dir/file.html'])]
    // #[TestWith(data: ['dir/subdir/file.js'])]

    /**
     * @test
     *
     * @testdox 'Invalid path $path does not end in "css".'
     *
     * @testWith
     * [""]
     * ["file.php"]
     * ["dir/file.html"]
     * ["dir/subdir/file.js"]
     */
    public function throw(mixed $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        CSS_Ext::of(path: $path);
    }
}
