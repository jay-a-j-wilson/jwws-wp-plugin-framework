<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo,
    Assertion\Assertion
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Post_Type_Repo extends Repo implements Post_Type_Repo {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Undocumented function.
     *
     * @return Collection<\WP_Post_Type>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_post_types(output: 'objects'),
        );
    }

    /**
     * Undocumented function.
     *
     * @throws \Exception
     */
    public function find_by_name(string $name): \WP_Post_Type {
        $post_types = get_post_types(
            args: ['name' => $name],
            output: 'objects',
        );

        Assertion::of(value: $post_types)
            ->not_empty(message: "Post type '{$name}' not found.")
        ;

        return $post_types[$name];
    }
}
