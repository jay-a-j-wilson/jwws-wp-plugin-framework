<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Utility\Tests\Integration;

use JWWS\WPPF\WordPress\Utility\{
    Tests\Integration\Fixtures\Fixture,
    Utility
};

/**
 * @covers \JWWS\WPPF\WordPress\Utility\Utility
 *
 * @internal
 */
final class Get_Term_Name extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1, $arg_2
     */
    public function pass(int $arg_1, string $arg_2): void {
        $this->expectOutputString(expectedString: $arg_2);

        echo Utility::get_term_name(
            term: \WP_Term::get_instance(term_id: $arg_1),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'root' => [6, 'Fruit'];

        yield 'level 1' => [7, '- Citrus'];

        yield 'level 2' => [8, '- - Lemon'];
    }
}
