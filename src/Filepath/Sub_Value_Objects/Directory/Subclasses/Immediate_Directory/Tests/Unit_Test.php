<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Tests;

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory;
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
    #[TestWith(data: ['folder/', 'subdir/folder/file.ext'])]
    #[TestWith(data: ['folder/', 'dir/subdir/folder/.ext'])]
    #[TestWith(data: ['subdir/', 'dir/subdir/folder/'])]
    // #[TestWith(['folder/', ''])]
    public function pass(string $dirname, string $path): void {
        $this->assertEquals(
            expected: $dirname,
            actual: Immediate_Directory::of(path: $path),
        );
    }

    // #[Test]
    #[TestDox(text: 'Invalid filename $path is not "file".')]
    #[TestWith(data: [''])]
    #[TestWith(data: ['.php'])]
    #[TestWith(data: ['dir/.html'])]
    #[TestWith(data: ['dir/subdir/.js'])]
    public function throw(mixed $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Immediate_Directory::of(path: $path);
    }
}
