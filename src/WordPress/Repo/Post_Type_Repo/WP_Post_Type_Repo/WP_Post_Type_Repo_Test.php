<?php

namespace JWWS\WPPF\WordPress\Repo\Post_Type_Repo\WP_Post_Type_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class WP_Post_Type_Repo_Test extends WP_Test {
    /**
     * @return void
     */
    public function hook(): void {
        $this->filter();
        // $this->find_by_name_attachment();
        // $this->pluck();
        // $this->find_by_name_post();
        // $this->find_by_name_invalid();
        // $this->list_all();
    }

    /**
     * @return void
     */
    private function filter(): void {
        WP_Post_Type_Repo::create()
            ->list_all()
            ->filter_by_value(
                callback: fn (\WP_Post_Type $x) => Error_Logger::log($x),
            )
        ;
    }

   /**
    * @param string $taxonomy
    *
    * @return void
    */
   private function list_all(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->list_all()
               ->count(),
       );
   }

   /**
    * @param string $taxonomy
    *
    * @return void
    */
   private function find_by_name_post(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->find_by_name(name: 'post'),
       );
   }

    /**
     * @param string $taxonomy
     *
     * @return void
     */
    private function find_by_name_invalid(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'invalid'),
        );
    }

    /**
     * @return void
     */
    private function find_by_name_attachment(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'attachment'),
        );
    }
}
