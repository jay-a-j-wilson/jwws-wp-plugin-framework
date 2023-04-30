<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo,
    Assertion\Assertion
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Taxonomy_Repo extends Repo implements Taxonomy_Repo {
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

        Assertion::of(value: $taxonomies)
            ->not_empty(message: "Taxonomy type '{$name}' not found.")
        ;

        return $taxonomies[$name];
    }
}
