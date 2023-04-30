<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\WP_User_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @cover WP_User_Repo
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: WP_User_Repo::class,
            actual: WP_User_Repo::create(),
        );
    }

    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: WP_User_Repo::create());
    }
}
