<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Factory\Tests\Unit;

use InvalidArgumentException;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Name_Header;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Factory\Name_Header_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Name_Header\Factory\Name_Header_Factory
 *
 * @internal
 *
 * @small
 */
final class Create extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: Name_Header::class,
            actual: Name_Header_Factory::of(basename: $arg)->create(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => ['akismet/akismet.php'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: InvalidArgumentException::class);
        Name_Header_Factory::of(basename: $arg)->create();
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'not installed' => ['plugin/plugin.php'];
    }
}
