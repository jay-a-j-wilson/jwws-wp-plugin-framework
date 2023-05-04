<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;

/**
 * @covers Post_Repo
 */
final class Find_By_Id extends Utility {
    /**
     * @test
     *
     * @dataProvider create_pass_data_provider
     *
     * @testdox create_pass: post with id $arg found
     */
    public function create_pass(int $arg): void {
        $this->assertSame(
            expected: $arg,
            actual: Post_Repo::create()
                ->find_by_id(id: $arg)
                ->ID,
        );
    }

    public static function create_pass_data_provider(): array {
        return [
            [1],
            [2],
            [3],
            [4],
            [5],
        ];
    }

    /**
     * @test
     *
     * @dataProvider create_throw_data_provider
     *
     * @testdox create_throw: ($_dataName) arg $arg throws e
     */
    public function create_throw(int $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Post_Repo::create()->find_by_id(id: $arg);
    }

    public static function create_throw_data_provider(): array {
        return [
            'not exists' => [6, 'post'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider of_pass_data_provider
     *
     * @testdox of_pass: $arg_2 with id $arg_1 found
     */
    public function of_pass(int $arg_1, string $arg_2): void {
        $this->assertSame(
            expected: $arg_1,
            actual: Post_Repo::of(post_type_names: $arg_2)
                ->find_by_id(id: $arg_1)
                ->ID,
        );
    }

    public static function of_pass_data_provider(): array {
        return [
            [1, 'post'],
            [2, 'post'],
            [3, 'post'],
            [4, 'page'],
            [5, 'page'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider of_throw_data_provider
     *
     * @testdox of_throw: ($_dataName) args $arg_1, $arg_2 throws e
     */
    public function of_throw(int $arg_1, string $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Post_Repo::of(post_type_names: $arg_2)->find_by_id(id: $arg_1);
    }

    public static function of_throw_data_provider(): array {
        return [
            'exists, empty type' => [1, ''],
            'exists, wrong type' => [4, 'post'],
            'not exists'         => [6, 'post'],
        ];
    }
}
