<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\WP_Post_Repo;

/**
 * @cover WP_Post_Repo
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * Undocumented function.
     */
    public function setUp(): void {
        parent::setup();

        self::factory()->post->create_many(
            count: 3,
            args: ['post_type' => 'post'],
        );

        self::factory()->post->create_many(
            count: 2,
            args: ['post_type' => 'page'],
        );
    }

    /**
     * @test
     *
     * @testdox $expected posts found in $post_type_names.
     *
     * @testWith
     * ["", 5]
     * ["post", 3]
     * ["page", 2]
     * ["invalid", 0]
     */
    // public function pass($post_type_names, int $expected): void {
    //     $this->assertSame(
    //         expected: $expected,
    //         actual: WP_Post_Repo::of($post_type_names)
    //             ->list_all()
    //             ->count(),
    //     );
    // }

    /**
     * //@test
     */
    public function pass_type_post_and_page(): void {
        $this->assertSame(
            expected: 5,
            actual: WP_Post_Repo::of('post', 'page')
                ->list_all()
                ->count(),
        );
    }
}
