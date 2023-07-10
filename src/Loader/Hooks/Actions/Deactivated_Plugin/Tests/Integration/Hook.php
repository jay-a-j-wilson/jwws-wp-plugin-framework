<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin_Factory
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
 *
 * @internal
 */
final class Hook extends \WP_UnitTestCase {
    private const HOOK = 'deactivated_plugin';

    private const METHOD = 'callback';

    private static Deactivated_Plugin $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$sut = Deactivated_Plugin::of(
            plugin: Basic_Plugin_Factory::create_and_get(),
        );
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertFalse(
            condition: has_action(
                self::HOOK,
                [
                    self::$sut,
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
    public function pass_action(): void {
        self::$sut->hook();

        self::assertSame(
            expected: 10,
            actual: has_action(
                self::HOOK,
                [
                    self::$sut,
                    self::METHOD,
                ],
            ),
        );
    }
}
