<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header\Name_Header;

/**
 * @covers Name_Header
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg [$arg_1, $arg_2]
     */
    public function pass(string $arg_1, string $arg_2): void {
        // $this->expectNotToPerformAssertions();
        // Name_Header::of(basename: $arg_1);

        $this->assertEquals(
            expected: $arg_2,
            actual: Name_Header::of(basename: $arg_1)->value,
        );
    }

    public static function pass_data_provider(): array {
        return [
            'installed' => ['akismet/akismet.php', 'Akismet Anti-Spam'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: $_dataName arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Name_Header::of(basename: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'not installed' => ['plugin/plugin.php'],
        ];
    }
}
