<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File\CSS_File;
use PHPUnit\Framework\TestCase;

/**
 * @covers CSS_File
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns "filename.css"
     */
    public function pass(string $arg): void {
        $this->assertEquals(
            expected: 'filename.css',
            actual: CSS_File::of(path: $arg)->value,
        );
    }

    public static function pass_data_provider(): array {
        return [
            'basic'               => ['filename.css'],
            'no ext'              => ['filename'],
            'nested dir'          => ['dir/sub_dir/filename.css'],
            'nested dir, dif ext' => ['dir/sub_dir/filename.php'],
        ];
    }
}
