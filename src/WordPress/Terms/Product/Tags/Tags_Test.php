<?php

namespace JWWS\WPPF\WordPress\Terms\Product\Tags;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\Abstract_WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Tags_Test extends Abstract_WP_Test {
    /**
     * @return void
     */
    public function hook(): void {
        // $this->find_by_id_fail();
        $this->find_by_id_pass();
        $this->list_all();
    }

    /**
     * @return void
     */
    private function list_all(): void {
        Error_Logger::log(
            output: Tags::create()->list_all(),
        );
    }

     /**
      * @return void
      */
     private function find_by_id_fail(): void {
         Error_Logger::log(
             output: Tags::create()->find_by_id(id: 111111111),
         );
     }

    /**
     * @return void
     */
    private function find_by_id_pass(): void {
        Error_Logger::log(
            output: Tags::create()->find_by_id(id: 35987),
        );
    }
}
