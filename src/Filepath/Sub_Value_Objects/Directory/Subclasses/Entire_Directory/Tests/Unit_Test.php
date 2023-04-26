<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Tests;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

#[CoversClass(Name::class)]
final class Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: 'Valid path $path returns "$dirname".')]
    #[TestWith(data: ['folder/', 'folder/file.ext'])]
    #[TestWith(data: ['folder/', 'folder/.ext'])]
    #[TestWith(data: ['subdir/folder/', 'subdir/folder/file.ext'])]
    #[TestWith(data: ['dir/subdir/folder/', 'dir/subdir/folder/.ext'])]
    #[TestWith(data: ['dir/subdir/', 'dir/subdir/folder/'])]
    #[TestWith(data: ['dir/subdir/', 'dir/subdir/folder'])]
    public function pass(string $dirname, string $path): void {
        $this->assertEquals(
            expected: $dirname,
            actual: Entire_Directory::of(path: $path),
        );
    }

    #[Test]
    #[TestDox(text: 'Invalid path $path returns "".')]
    #[TestWith(data: [''])]
    #[TestWith(data: ['.php'])]
    #[TestWith(data: ['file.php'])]
    #[TestWith(data: ['file.'])]
    public function empty_throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Entire_Directory::of(path: $path);
    }
}
