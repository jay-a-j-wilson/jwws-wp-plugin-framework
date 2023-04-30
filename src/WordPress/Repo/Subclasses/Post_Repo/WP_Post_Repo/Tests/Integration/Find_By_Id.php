<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\WP_Post_Repo;

/**
 * @cover WP_Post_Repo
 */
final class Find_By_Id extends \WP_UnitTestCase {
    /**
     * Undocumented function.
     */
    public function setup(): void {
        parent::setup();

        foreach (range(start: 1, end: 3) as $id) {
            self::factory()
                ->post
                ->create(args: [
                    'import_id' => $id,
                ])
            ;
        }
    }

    /**
     * @test
     *
     * @testdox Post with valid id $id found.
     *
     * @testWith
     * [1]
     * [2]
     * [3]
     */
    public function pass(int $id): void {
        $this->assertSame(
            expected: $id,
            actual: WP_Post_Repo::of(post_type_names: 'post')
                ->find_by_id(id: $id)
                ->ID,
        );
    }

    /**
     * @test
     *
     * @testdox Post with invalid id $id not found.
     *
     * @testWith
     * [4]
     * [5]
     * [6]
     */
    public function throw(int $id): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        WP_Post_Repo::of(post_type_names: 'post')
            ->find_by_id(id: $id)
        ;
    }
}
