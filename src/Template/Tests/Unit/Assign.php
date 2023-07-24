<?php declare(strict_types=1);

namespace JWWS\WPPF\Template\Tests;

use JWWS\WPPF\Template\Template;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Template\Template
 *
 * @internal
 *
 * @small
 */
final class Assign extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2, $arg_3
     */
    public function pass(string $arg_1, mixed $arg_2, string $arg_3): void {
        self::expectOutputString(
            expectedString: Template::of(path: $arg_1)
                ->assign(key: 'data', value: $arg_2)
                ->output(),
        );

        echo $arg_3;
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            __DIR__ . '/templates/basic.html.php',
            'Variable',
            '<p>Test Basic Template Variable</p>',
        ];

        yield 'array' => [
            __DIR__ . '/templates/array.html.php',
            ['a', 'b', 'c'],
            '<p>Test Array Template a, b, c</p>',
        ];
    }
}
