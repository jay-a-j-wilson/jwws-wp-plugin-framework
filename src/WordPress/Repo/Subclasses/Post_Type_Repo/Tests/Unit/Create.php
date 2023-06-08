<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo
 *
 * @internal
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: Post_Type_Repo::create());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Post_Type_Repo::class,
            actual: Post_Type_Repo::create(),
        );
    }
}
