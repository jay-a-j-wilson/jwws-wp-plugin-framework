<?php declare(strict_types=1);

final class Test_WP_Simple_Plugin extends WP_UnitTestCase {
    /**
     * @test
     */
    public function phpunit(): void {
        $this->assertTrue(condition: true);
    }

    /**
     * @testX
     */
    public function constants(): void {
        $this->assertSame(expected: 'wp-simple-plugin', actual: WPSP_NAME);

        $url = str_replace(
            search: 'tests/phpunit/tests/',
            replace: '',
            subject: trailingslashit(plugin_dir_url(file: __FILE__)),
        );

        $this->assertSame(expected: $url, actual: WPSP_URL);
    }

    /**
     * @test
     */
    public function wpsp_option(): void {
        $this->assertTrue(
            condition: get_option(
                option: 'wpsp_test',
            ),
        );
    }

    /**
     * @test
     */
    public function pages(): void {
        $this->factory()
            ->post
            ->create_many(
                count: 3,
                args: ['post_type' => 'page'],
            )
        ;

        $this->assertCount(
            expectedCount: 3,
            haystack: get_pages(),
        );
    }

    /**
     * @test
     */
    public function pages_print(): void {
        $this->expectNotToPerformAssertions();
        $this->factory()
            ->post
            ->create_many(
                count: 3,
                args: ['post_type' => 'page'],
            )
        ;

        echo print_r(
            value: get_pages(),
            return: true,
        );
    }
}
