<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo;

/**
 * @cover WP_Post_Type_Repo
 */
final class Find_By_Name extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @testdox Valid post type $name found.
     *
     * @testWith
     * ["post"]
     * ["page"]
     * ["attachment"]
     * ["revision"]
     */
    public function pass(string $name): void {
        $this->assertSame(
            expected: $name,
            actual: WP_Post_Type_Repo::create()
                ->find_by_name(name: $name)
                ->name,
        );
    }

    /**
     * @test
     *
     * @testdox Invalid post type $name not found.
     *
     * @testWith
     * ["invalid"]
     */
    public function throw(string $name): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        WP_Post_Type_Repo::create()->find_by_name(name: $name);
    }
}
