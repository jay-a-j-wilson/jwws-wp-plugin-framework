<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo
 *
 * @internal
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: User_Repo::create());
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: User_Repo::class,
            actual: User_Repo::create(),
        );
    }
}
