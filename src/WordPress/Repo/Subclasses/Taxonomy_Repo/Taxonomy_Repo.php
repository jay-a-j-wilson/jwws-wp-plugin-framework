<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo;

use JWWS\WPPF\{
    Assertion\Array_Assertion\Array_Assertion,
    Assertion\WordPress_Assertion\Slug\Slug as WordPress_Slug_Assertion,
    Collection\Collection,
    Collection\Standard_Collection\Standard_Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Taxonomy_Repo extends Repo {
    /**
     * Returns an object collection of all registered taxonomies.
     *
     * @return Collection<\WP_Taxonomy>
     */
    public function list_all(): Collection {
        return Standard_Collection::of(
            ...get_taxonomies(output: 'objects'),
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function find_by_name(string $name): \WP_Taxonomy {
        WordPress_Slug_Assertion::of(slug: $name)->is_valid();

        $taxonomies = get_taxonomies(
            args: ['name' => $name],
            output: 'objects',
        );

        Array_Assertion::of(array: $taxonomies)
            ->is_not_empty(message: "Taxonomy type '{$name}' not found.")
        ;

        return $taxonomies[$name];
    }
}
