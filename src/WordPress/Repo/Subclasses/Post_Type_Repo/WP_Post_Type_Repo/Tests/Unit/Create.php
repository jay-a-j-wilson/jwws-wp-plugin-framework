<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @cover WP_Post_Type_Repo
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: WP_Post_Type_Repo::class,
            actual: WP_Post_Type_Repo::create(),
        );
    }

    /**
     * //@test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: WP_Post_Type_Repo::create());
    }
}
