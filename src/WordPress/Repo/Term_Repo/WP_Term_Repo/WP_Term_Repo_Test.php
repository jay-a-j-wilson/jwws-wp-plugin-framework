<?php

namespace JWWS\WPPF\WordPress\Repo\Term_Repo\WP_Term_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test,
    WordPress\Repo\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class WP_Term_Repo_Test extends WP_Test {
    /**
     * @return void
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
    * @param string $taxonomy
    *
    * @return void
    */
   private function list_all(): void {
        WP_Term_Repo::create()
            ->list_all()
            ->pluck(key: 'name')
            ->log()
        ;
   }

   /**
    * @param string $taxonomy
    *
    * @return void
    */
   private function list_all_category(): void {
       WP_Term_Repo::of(taxonomy_names: 'category')
           ->list_all()
        //    ->pluck(key: 'name')
           ->log()
       ;
   }

   /**
    * @param string $taxonomy
    *
    * @return void
    */
   private function list_all_product_cat(): void {
        WP_Term_Repo::of(taxonomy_names: 'product_cat')
            ->list_all()
            ->pluck(key: 'name')
            ->log()
        ;
   }

    /**
     * @param string $taxonomy
     *
     * @return void
     */
    private function list_all_category_product_cat(): void {
        WP_Term_Repo::of('category', 'product_cat')
            ->list_all()
            ->pluck(key: 'name')
            ->log()
        ;
    }

    private function find_by_id_category_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'category')
                ->find_by_id(id: 97), // Uncategorized - Category 
        );
    }

    /**
     * @return void
     */
    private function find_by_id_product_cat_pass(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 36462), // parts
        );
    }

    private function find_by_id_product_cat_fail(): void {
        Error_Logger::log(
            output: WP_Term_Repo::of(taxonomy_names: 'product_cat')
                ->find_by_id(id: 97), // Uncategorized - Category 
        );
    }
}
