<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Test;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
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
    #[TestDox('Valid filename $path is "file".')]
    #[TestWith(['file.php'])]
    #[TestWith(['dir/file.php'])]
    #[TestWith(['dir/subdir/file.php'])]
    public function pass(mixed $path): void {
        $this->assertEquals(
            expected: 'file',
            actual: Name::of(path: $path),
        );
    }

    #[Test]
    #[TestDox('Invalid filename $path is not "file".')]
    #[TestWith([''])]
    #[TestWith(['.php'])]
    #[TestWith(['dir/.html'])]
    #[TestWith(['dir/subdir/.js'])]
    public function throw(mixed $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Name::of(path: $path);
    }
}
