<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

#[CoversClass(Name::class)]
final class Name_Test extends TestCase {
    #[Test]
    public function can_be_created_with_valid_code(): void {
        $this->assertInstanceOf(
            expected: Name::class,
            actual: Name::of(path: 'file.php'),
        );
    }

    #[Test]
    #[TestDox('Valid filename $path is "file".')]
    #[TestWith(['file.php'])]
    #[TestWith(['dir/file.php'])]
    #[TestWith(['dir/subdir/file.php'])]
    public function valid_argument_should_pass(mixed $path): void {
        $this->assertEquals(
            expected: 'file',
            actual: Name::of(path: $path),
        );
    }

    #[Test]
    #[TestDox('Invalid filename $path is not "file".')]
    #[TestWith([''])]
    #[TestWith(['.php'])]
    #[TestWith(['\file.css'])]
    #[TestWith(['dir/.html'])]
    #[TestWith(['dir/subdir/.js'])]
    public function invalid_argument_should_throw_exception(mixed $path): void {
        $this->expectException(exception: InvalidArgumentException::class);
        Name::of(path: $path);
    }
}
