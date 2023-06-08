<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo;

use JWWS\WPPF\{
    Assertion\Array_Assertion\Array_Assertion,
    Assertion\WordPress_Assertion\Slug\Slug as WordPress_Slug_Assertion,
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Post_Type_Repo extends Repo {
    /**
     * @return Collection<\WP_Post_Type>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_post_types(output: 'objects'),
        );
    }

    /**
     * @throws \InvalidArgumentException if not found
     */
    public function find_by_name(string $name): \WP_Post_Type {
        WordPress_Slug_Assertion::of(slug: $name)->is_valid();

        $post_types = get_post_types(
            args: ['name' => $name],
            output: 'objects',
        );

        Array_Assertion::of(array: $post_types)
            ->is_not_empty(message: "Post type '{$name}' not found.")
        ;

        return $post_types[$name];
    }
}
