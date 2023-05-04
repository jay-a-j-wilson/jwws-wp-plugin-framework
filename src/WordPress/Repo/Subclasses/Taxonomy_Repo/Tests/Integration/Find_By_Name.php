<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;

/**
 * @covers Taxonomy_Repo
 */
final class Find_By_Name extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName - arg $arg returns $arg
     */
    public function pass(string $arg): void {
        $this->assertSame(
            expected: $arg,
            actual: Taxonomy_Repo::create()
                ->find_by_name(name: $arg)
                ->name,
        );
    }

    public static function pass_data_provider(): array {
        return [
            ['category'],
            ['post_tag'],
            ['nav_menu'],
            ['link_category'],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: $_dataName - arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Taxonomy_Repo::create()->find_by_name(name: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            ['invalid'],
        ];
    }
}
