<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Filepath\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Value_Objects\Filepath\Filepath;

/**
 * @covers Filepath
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns ".../wp-content/plugins/dir/filename.php"
     */
    public function pass(string $arg): void {
        $this->assertStringEndsWith(
            suffix: '/wp-content/plugins/dir/filename.php',
            string: Filepath::of(basename: $arg)->value,
        );
    }

    public static function pass_data_provider(): array {
        return [
            'basic'       => ['dir/filename.php'],
            'non php ext' => ['dir/filename.txt'],
            'no ext'      => ['dir/filename'],
            'nested dir' => ['sup_dir/dir/filename.php'],
        ];
    }
}
