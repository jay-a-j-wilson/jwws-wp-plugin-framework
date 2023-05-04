<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;

/**
 * @covers Post_Repo
 */
final class List_All extends Utility {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: ($_dataName) arg $arg returns $expected
     */
    public function pass(array $arg, int $expected): void {
        $this->assertCount(
            expectedCount: $expected,
            haystack: Post_Repo::of(...$arg)->list_all(),
        );
    }

    public static function pass_data_provider(): array {
        return [
            'post'                => [['post'], 3],
            'page'                => [['page'], 2],
            'post + page'         => [['post', 'page'], 5],
            'not exists'          => [['invalid'], 5],
            'not exists + exists' => [['invalid', 'post'], 3],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: ($_dataName) args $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Post_Repo::of(post_type_names: $arg)->list_all();
    }

    public static function throw_data_provider(): array {
        return [
            'empty' => [''],
        ];
    }
}
