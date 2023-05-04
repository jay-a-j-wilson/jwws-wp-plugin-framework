<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;

/**
 * @covers Term_Repo
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
            haystack: Term_Repo::of(...$arg)->list_all(),
        );
    }

    public static function pass_data_provider(): array {
        return [
            'category'            => [['category'], 3],
            'post_tag'            => [['post_tag'], 2],
            'category + post_tag' => [['category', 'post_tag'], 5],
            'not exists'          => [['invalid'], 5],
            'not exists + exists' => [['invalid', 'category'], 3],
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
        Term_Repo::of($arg)->list_all();
    }

    public static function throw_data_provider(): array {
        return [
            'empty' => [''],
        ];
    }
}
