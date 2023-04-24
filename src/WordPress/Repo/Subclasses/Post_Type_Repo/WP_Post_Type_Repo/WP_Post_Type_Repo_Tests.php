<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Tests
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Post_Type_Repo_Tests extends WP_Tests {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        // self::filter();
        // self::find_by_name_attachment();
        // self::pluck();
        // self::find_by_name_post();
        // self::find_by_name_invalid();
        self::list_all();
    }

    /**
     * Undocumented function.
     */
    private static function filter(): void {
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
   private static function list_all(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->list_all(),
            //    ->count(),
       );
   }

   /**
    * Undocumented function.
    */
   private static function find_by_name_post(): void {
       Error_Logger::log(
           output: WP_Post_Type_Repo::create()
               ->find_by_name(name: 'post'),
       );
   }

    /**
     * Undocumented function.
     */
    private static function find_by_name_invalid(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'invalid'),
        );
    }

    /**
     * Undocumented function.
     */
    private static function find_by_name_attachment(): void {
        Error_Logger::log(
            output: WP_Post_Type_Repo::create()
                ->find_by_name(name: 'attachment'),
        );
    }
}
