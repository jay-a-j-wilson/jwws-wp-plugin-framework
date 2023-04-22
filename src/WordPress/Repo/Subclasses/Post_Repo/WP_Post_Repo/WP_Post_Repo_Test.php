<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo;

use JWWS\WPPF\{Common\Security\Security, Logger\Error_Logger\Error_Logger, WordPress\Testing\WP_Test};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Post_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        // $this->create();
        // $this->create_from_post();
        // $this->create_from_post_page();
        // $this->list_all_product();
        $this->find_by_id_product_pass();
        // $this->find_by_id_product_fail();
        // $this->list_all();
    }

    /**
     * Undocumented function.
     */
    private function list_all(): void {
        WP_Post_Repo::create()
            ->list_all()
            ->log()
        ;
    }

    /**
     * Undocumented function.
     */
    private function create(): void {
        Error_Logger::log(
            output: WP_Post_Repo::create(),
        );
    }

    /**
     * Undocumented function.
     */
    private function create_from_post(): void {
        Error_Logger::log(
            output: WP_Post_Repo::of('post'),
        );
    }

    /**
     * Undocumented function.
     */
    private function create_from_post_page(): void {
        Error_Logger::log(
            output: WP_Post_Repo::of('post', 'page'),
        );
    }

    /**
     * Undocumented function.
     */
    private function find_by_id_product_pass(): void {
        Error_Logger::log(
            output: WP_Post_Repo::of('post', 'product')
                ->find_by_id(id: 3472), // Horizon
        );
    }

    /**
     * Undocumented function.
     */
    private function find_by_id_product_fail(): void {
        Error_Logger::log(
            output: WP_Post_Repo::of(post_type_names: 'product')
                ->find_by_id(id: 3472222222222), // Horizon
        );
    }

    /**
     * Undocumented function.
     */
    private function list_all_product(): void {
        Error_Logger::log(
            output: WP_Post_Repo::of(post_type_names: 'product')
                ->list_all(),
        );
    }
}
