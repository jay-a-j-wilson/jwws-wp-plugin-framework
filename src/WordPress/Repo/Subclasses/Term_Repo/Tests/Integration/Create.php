<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo;

/**
 * @covers Term_Repo
 */
final class Create extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo print_r(
            value: Term_Repo::create(),
            return: true,
        ) . PHP_EOL;
    }

    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Term_Repo::class,
            actual: Term_Repo::create(),
        );
    }
}
