<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

#[CoversClass(PHP_Ext::class)]
final class PHP_Ext_Test extends TestCase {
    #[Test]
    public function can_be_created_with_valid_code(): void {
        $this->assertInstanceOf(
            expected: PHP_Ext::class,
            actual: PHP_Ext::of(path: 'file.php'),
        );
    }

    #[Test]
    #[TestDox('Valid path $path ends in "php".')]
    #[TestWith(['file.php'])]
    #[TestWith(['dir/file.php'])]
    #[TestWith(['dir/subdir/file.php'])]
    public function valid_argument_should_pass(mixed $path): void {
        $this->assertEquals(
            expected: 'php',
            actual: PHP_Ext::of(path: $path),
        );
    }

    #[Test]
    #[TestDox('Invalid path $path does not end in "php".')]
    #[TestWith([''])]
    #[TestWith(['file.php.'])]
    #[TestWith(['file.css'])]
    #[TestWith(['dir/file.html'])]
    #[TestWith(['dir/subdir/file.js'])]
    public function invalid_argument_should_throw_exception(mixed $path): void {
        $this->expectException(exception: InvalidArgumentException::class);
        PHP_Ext::of(path: $path);
    }
}
