<?php

namespace JWWS\WPPF\WordPress\Repo\Taxonomy_Repo\WP_Taxonomy_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Taxonomy_Repo\Taxonomy_Repo,
    Collection\Collection
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Taxonomy_Repo extends Repo implements Taxonomy_Repo {
    /**
     * @param string $taxonomy
     *
     * @return static
     */
    public static function create(): self {
        return new self();
    }

    /**
     * @return Collection<\WP_Taxonomy>
     */
    public function list_all(): Collection {
        return Collection::of(
            items: get_taxonomies(output: 'objects'),
        );
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return \WP_Taxonomy
     */
    public function find_by_name(string $name): \WP_Taxonomy {
        $taxonomies = get_taxonomies(
            args: ['name' => $name],
            output: 'objects',
        );

        if (empty($taxonomies)) {
            throw new \Exception(
                message: "Taxonomy type '{$name}' not found.",
            );
        }

        return $taxonomies[$name];
    }
}
