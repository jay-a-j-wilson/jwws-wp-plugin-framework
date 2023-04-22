<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Post_Type_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
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
     * Undocumented function.
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
    * Undocumented function.
    */
   private function list_all(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->list_all()
               ->count(),
       );
   }

   /**
    * Undocumented function.
    */
   private function find_by_name_post(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->find_by_name(name: 'post'),
       );
   }

    /**
     * Undocumented function.
     */
    private function find_by_name_invalid(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'invalid'),
        );
    }

    /**
     * Undocumented function.
     */
    private function find_by_name_attachment(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'attachment'),
        );
    }
}
