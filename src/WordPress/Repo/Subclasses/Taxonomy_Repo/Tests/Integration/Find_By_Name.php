<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo
 *
 * @internal
 */
final class Find_By_Name extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $arg
     */
    public function pass(string $arg): void {
        self::assertSame(
            expected: $arg,
            actual: Taxonomy_Repo::new_instance()
                ->find_by_name(name: $arg)
                ->name,
        );
    }

    public static function pass_data_provider(): iterable {
        yield ['category'];

        yield ['post_tag'];

        yield ['nav_menu'];

        yield ['link_category'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Taxonomy_Repo::new_instance()->find_by_name(name: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'missing' => ['invalid'];
    }
}
