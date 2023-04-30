<?php

namespace JWWS\WPPF\Filepath;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @cover Filepath
 */
final class Unit_Test extends TestCase {
    /**
     * @test
     */
    public function can_run(): void {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function can_echo_class_name(): void {
        $this->expectOutputString(
            Filepath::class,
        );

        echo __NAMESPACE__ . '\Filepath';
    }
}
