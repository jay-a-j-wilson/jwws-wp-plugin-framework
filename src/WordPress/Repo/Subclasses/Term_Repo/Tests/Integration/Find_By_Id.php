<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;

/**
 * @covers Term_Repo
 */
final class Find_By_Id extends Utility {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: ($_dataName) $arg_2 with id $arg_1 found
     */
    public function pass(int $arg_1, string $arg_2): void {
        $this->assertSame(
            expected: $arg_1,
            actual: Term_Repo::of(taxonomy_names: $arg_2)
                ->find_by_id(id: $arg_1)
                ->ID,
        );
    }

    public static function pass_data_provider(): array {
        return [
            [1, 'category'],
            [2, 'category'],
            [3, 'category'],
            [4, 'post_tag'],
            [5, 'post_tag'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: ($_dataName) args $arg_1, $arg_2 throws e
     */
    public function throw(int $arg_1, string $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Term_Repo::of(post_type_names: $arg_2)
            ->find_by_id(id: $arg_1)
        ;
    }

    public static function throw_data_provider(): array {
        return [
            'exists, empty type' => [1, ''],
            'exists, wrong type' => [4, 'category'],
            'not exists'         => [6, 'post_tag'],
        ];
    }
}
