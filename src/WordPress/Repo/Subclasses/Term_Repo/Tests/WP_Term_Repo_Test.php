<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\WP_Term_Repo\Tests;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\WP_Term_Repo\WP_Term_Repo;
use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Term_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        // self::find_by_id_product_cat();
        // self::list_all();
        // self::list_all_category();
        // self::list_all_product_cat();
        // self::list_all_category_product_cat();
        // self::find_by_id_category_pass();
        self::find_by_id_product_cat_pass();
        self::find_by_id_product_cat_fail();
    }

   /**
    * Undocumented function.
    */
   private static function list_all(): void {
       Error_Logger::log(
           WP_Term_Repo::create()
               ->list_all()
       );
   }

   /**
    * Undocumented function.
    */
   private static function list_all_category(): void {
       Error_Logger::log(
           WP_Term_Repo::of(taxonomy_names: 'category')
               ->list_all(),
        //    ->pluck(key: 'name')
       );
   }

   /**
    * Undocumented function.
    */
   private static function list_all_product_cat(): void {
       Error_Logger::log(
           WP_Term_Repo::of(taxonomy_names: 'product_cat')
               ->list_all()
               ->pluck(key: 'name'),
       );
   }

    /**
     * Undocumented function.
     */
    private static function list_all_category_product_cat(): void {
        Error_Logger::log(
            WP_Term_Repo::of('category', 'product_cat')
                ->list_all()
                ->pluck(key: 'name'),
        );
    }

    /**
     * Undocumented function.
     */
    private static function find_by_id_category_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'category')
                ->find_by_id(id: 97), // Uncategorized - Category
        );
    }

    /**
     * Undocumented function.
     */
    private static function find_by_id_product_cat_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 36462), // parts
        );
    }

    /**
     * Undocumented function.
     */
    private static function find_by_id_product_cat_fail(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 97), // Uncategorized - Category
        );
    }
}
