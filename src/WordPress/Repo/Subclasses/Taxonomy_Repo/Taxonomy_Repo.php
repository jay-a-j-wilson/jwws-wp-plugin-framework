<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    Assertion\Array_Assertion\Array_Assertion
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Taxonomy_Repo extends Repo {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Returns an object collection of all registered taxonomies.
     *
     * @return Collection<\WP_Taxonomy>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_taxonomies(output: 'objects'),
        );
    }

    /**
     * Undocumented function.
     *
     * @throws \Exception
     */
    public function find_by_name(string $name): \WP_Taxonomy {
        $taxonomies = get_taxonomies(
            args: ['name' => $name],
            output: 'objects',
        );

        Array_Assertion::of(array: $taxonomies)
            ->not_empty(message: "Taxonomy type '{$name}' not found.")
        ;

        return $taxonomies[$name];
    }
}
