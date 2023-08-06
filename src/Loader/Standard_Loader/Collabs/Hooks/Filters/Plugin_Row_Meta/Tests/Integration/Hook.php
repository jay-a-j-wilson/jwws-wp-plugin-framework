<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta;
use function has_filter;

/**
 * @covers \JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta
 *
 * @internal
 *
 * @small
 */
final class Hook extends \WP_UnitTestCase {
    private const HOOK = 'plugin_row_meta';

    private const METHOD = 'callback';

    private Plugin_Row_Meta $sut;

    protected function setUp(): void {
        parent::setUp();

        $this->sut = Plugin_Row_Meta::of(
            plugin: self::createStub(originalClassName: Plugin::class),
        );
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertFalse(
            condition: has_filter(
                self::HOOK,
                [
                    $this->sut,
                    self::METHOD,
                ],
            ),
        );
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_filter(): void {
        $this->sut->hook();

        self::assertSame(
            expected: 10,
            actual: has_filter(
                self::HOOK,
                [
                    $this->sut,
                    self::METHOD,
                ],
            ),
        );
    }
}
