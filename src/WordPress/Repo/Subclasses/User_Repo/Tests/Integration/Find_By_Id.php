<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\User_Repo;

/**
 * @covers User_Repo
 */
final class Find_By_Id extends Utility {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: ($_dataName) arg $arg returns $arg
     */
    public function pass(int $arg): void {
        $this->assertSame(
            expected: $arg,
            actual: User_Repo::create()
                ->find_by_id(id: $arg)
                ->ID,
        );
    }

    public static function pass_data_provider(): array {
        return [
            [1],
            [2],
            // [3],
            // [4],
            // [5],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: ($_dataName) arg $arg throws e
     */
    public function throw(int $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        User_Repo::create()->find_by_id(id: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'zero'            => [0],
            'negative number' => [-1],
        ];
    }
}
