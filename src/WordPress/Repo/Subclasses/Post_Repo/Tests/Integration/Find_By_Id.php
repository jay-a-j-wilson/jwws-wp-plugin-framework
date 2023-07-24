<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;
use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration\Fixtures\Fixture;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo
 *
 * @internal
 *
 * @small
 */
final class Find_By_Id extends Fixture {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(int $arg): void {
        self::assertSame(
            expected: $arg,
            actual: Post_Repo::new_instance()->find_by_id(id: $arg)->ID,
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
     * @testdox throw[$_dataName] $arg
     */
    public function throw(int $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Post_Repo::new_instance()->find_by_id(id: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'zero' => [0];

        yield 'negative' => [-1];

        yield 'not exists' => [6];
    }
}
