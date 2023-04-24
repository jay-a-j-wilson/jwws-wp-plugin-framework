<?php

namespace JWWS\WPPF\Filepath;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class Filepath_Test extends TestCase {
    /**
     * @test
     */
    public function can_run(): void {
        $this->assertTrue(true);
    }

    /**
     * @testx
     */
    public function can_echo_class_name(): void {
        $this->expectOutputString(
            Filepath::class,
        );

        echo __NAMESPACE__ . '\Filepath';
    }
}
