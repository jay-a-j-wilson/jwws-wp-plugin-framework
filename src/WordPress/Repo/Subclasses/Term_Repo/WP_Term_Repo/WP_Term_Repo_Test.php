<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\WP_Term_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Term_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        // $this->find_by_id_product_cat();
        // $this->list_all();
        // $this->list_all_category();
        // $this->list_all_product_cat();
        // $this->list_all_category_product_cat();
        $this->find_by_id_category_pass();
        $this->find_by_id_product_cat_pass();
        // $this->find_by_id_product_cat_fail();
    }

   /**
    * Undocumented function.
    */
   private function list_all(): void {
       WP_Term_Repo::create()
           ->list_all()
           ->pluck(key: 'name')
           ->log()
       ;
   }

   /**
    * Undocumented function.
    */
   private function list_all_category(): void {
       WP_Term_Repo::of(taxonomy_names: 'category')
           ->list_all()
        //    ->pluck(key: 'name')
           ->log()
       ;
   }

   /**
    * Undocumented function.
    */
   private function list_all_product_cat(): void {
       WP_Term_Repo::of(taxonomy_names: 'product_cat')
           ->list_all()
           ->pluck(key: 'name')
           ->log()
       ;
   }

    /**
     * Undocumented function.
     */
    private function list_all_category_product_cat(): void {
        WP_Term_Repo::of('category', 'product_cat')
            ->list_all()
            ->pluck(key: 'name')
            ->log()
        ;
    }

    /**
     * Undocumented function.
     */
    private function find_by_id_category_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'category')
                ->find_by_id(id: 97), // Uncategorized - Category
        );
    }

    /**
     * Undocumented function.
     */
    private function find_by_id_product_cat_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 36462), // parts
        );
    }

    /**
     * Undocumented function.
     */
    private function find_by_id_product_cat_fail(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 97), // Uncategorized - Category
        );
    }
}
