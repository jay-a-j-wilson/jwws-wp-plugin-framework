<?php

namespace JWWS\WPPF\WordPress\Repo\Term_Repo\WP_Term_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Term_Repo\Term_Repo,
    WordPress\Repo\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo,
    Collection\Collection
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Term_Repo extends Repo implements Term_Repo {
    /**
     * @return self
     */
    public static function create(): self {
        return new self(
            taxonomies: WP_Taxonomy_Repo::create()
                ->list_all(),
        );
    }

    /**
     * @param string $taxonomy_names
     *
     * @return self
     */
    public static function of(string ...$taxonomy_names): self {
        return new self(
            taxonomies: WP_Taxonomy_Repo::create()
                ->list_all()
                ->filter_by_value(
                    callback: fn (\WP_Taxonomy $taxonomy): bool => Collection::of(items: $taxonomy_names)
                        ->contains_value(value: $taxonomy->name),
                ),
        );
    }

    /**
     * @param Collection $taxonomies
     *
     * @return void
     */
    private function __construct(private Collection $taxonomies) {
    }

    /**
     * @return Collection<\WP_Term>
     */
    public function list_all(): Collection {
        return Collection::of(
            items: get_terms(args: [
                'taxonomy' => $this->taxonomies
                    ->pluck(key: 'name')
                    ->to_array(),
                'hide_empty' => false,
            ]),
        );
    }

    /**
     * @param int $id
     *
     * @return \WP_Term
     */
    public function find_by_id(int $id): \WP_Term {
        $term           = get_term(term: $id);
        $taxonomy_names = $this->taxonomies->pluck(key: 'name');

        if (! $taxonomy_names->contains_value(value: $term->taxonomy)) {
            throw new \Exception(
                message: "Term with id '{$id}' not found with taxonomy: {$taxonomy_names->to_string()}.",
            );
        }

        return $term;
    }
}
