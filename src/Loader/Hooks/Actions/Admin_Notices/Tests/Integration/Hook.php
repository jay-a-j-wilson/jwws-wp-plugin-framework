<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Notices\Admin_Notices,
    Tests\Integration\Fixtures\Akismet_Plugin_Factory,
    Tests\Integration\Fixtures\Basic_Plugin_Factory
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices
 *
 * @internal
 */
final class Hook extends \WP_UnitTestCase {
    private const HOOK = 'admin_notices';

    private const METHOD = 'callback';

    protected static Admin_Notices $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$sut = Admin_Notices::of(
            plugin: Basic_Plugin_Factory::create_and_get(),
            dependency: Akismet_Plugin_Factory::create_and_get(),
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
