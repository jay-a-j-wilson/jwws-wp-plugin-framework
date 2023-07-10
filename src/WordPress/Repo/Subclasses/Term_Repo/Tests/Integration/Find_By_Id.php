<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\{
    Term_Repo,
    Tests\Integration\Fixtures\Fixture
};

/**
 * @covers JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo
 */
final class Find_By_Id extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => term with id $arg found
     */
    public function pass(int $arg): void {
        $this->assertSame(
            expected: $arg,
            actual: Term_Repo::new_instance()->find_by_id(id: $arg)->term_id,
        );
    }

    public static function pass_data_provider(): iterable {
        yield [1];

        yield [2];

        yield [3];

        yield [4];

        yield [5];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(int $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Term_Repo::new_instance()->find_by_id(id: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'zero' => [0];

        yield 'negative' => [-1];

        yield 'not exists' => [6];
    }
}
