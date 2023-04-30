<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\WP_User_Repo;

/**
 * @cover WP_Taxonomy_Repo
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * @test
     */
    // public function output(): void {
    //     $this->expectNotToPerformAssertions();
    //     echo print_r(
    //         value: WP_User_Repo::create()
    //             ->list_all()
    //             ->pluck(key: 'email')
    //             ->implode(separator: PHP_EOL),
    //         return: true,
    //     ) . PHP_EOL;
    // }

    /**
     * @test
     */
    public function pass(): void {
        $this->assertCount(
            expectedCount: 1,
            haystack: WP_User_Repo::create()->list_all(),
        );
    }
}
