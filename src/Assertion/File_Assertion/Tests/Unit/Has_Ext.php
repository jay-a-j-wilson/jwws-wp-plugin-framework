<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\File_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\File_Assertion\File_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers File_Assertion
 */
final class Has_Ext extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox "$filepath" is "$ext".
     */
    public function pass(string $filepath, string $ext): void {
        $this->expectNotToPerformAssertions();
        File_Assertion::of(filepath: $filepath)->has_ext(ext: $ext);
    }

    public static function pass_data_provider(): array {
        return [
            ['file.php', 'php'],
            ['folder/file.txt', 'txt'],
            ['folder/subfolder/file.html', 'html'],
            ['.php', 'php'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox "$filepath" is not "$ext".
     */
    public function throw(string $filepath, string $ext): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        File_Assertion::of(filepath: $filepath)->has_ext(ext: $ext);
    }

    public static function throw_data_provider(): array {
        return [
            ['php', 'php'],
            ['file.php', 'txt'],
            ['folder/file.txt', 'html'],
            ['folder/subfolder/file.html', 'php'],
        ];
    }
}
