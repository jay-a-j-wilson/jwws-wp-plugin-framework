<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Description_Header;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Description_Header
 *
 * @internal
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(string $arg_1, string $arg_2): void {
        self::assertStringStartsWith(
            prefix: $arg_2,
            string: Description_Header::of(basename: $arg_1)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => [
            'akismet/akismet.php',
            'Used by millions, Akismet is quite possibly the best way',
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Description_Header::of(basename: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'not installed' => ['plugin/plugin.php'];
    }
}
