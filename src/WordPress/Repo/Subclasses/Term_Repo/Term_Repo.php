<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo,
    Assertion\Assertion,
    Assertion\String_Assertion\String_Assertion
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Term_Repo extends Repo  {
    /**
     * Creates a repository with all terms.
     */
    public static function create(): self {
        return new self(
            taxonomies: Taxonomy_Repo::create()
                ->list_all(),
        );
    }

    /**
     * Creates a repository filtered by the specified taxonomy names.
     */
    public static function of(string ...$taxonomy_names): self {
        foreach ($taxonomy_names as $taxonomy_name) {
            String_Assertion::of($taxonomy_name)->not_empty();
        }

        return new self(
            taxonomies: Taxonomy_Repo::create()
                ->list_all()
                ->filter_by_value(
                    callback: fn (\WP_Taxonomy $taxonomy): bool => 
                        Collection::of(...$taxonomy_names)
                            ->contains_value(value: $taxonomy->name),
                ),
        );
    }

    /**
     * Enforces use of factory methods.
     */
    private function __construct(private Collection $taxonomies) {
    }

    /**
     * @return Collection<\WP_Term>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_terms(args: [
                'taxonomy' => $this->taxonomies
                    ->pluck(key: 'name')
                    ->to_array(),
                'hide_empty' => false,
            ]),
        );
    }

    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_Term {
        return $this->validate(term: get_term(term: $id));
    }

    /**
     * Checks term is found with taxonomy.
     *
     * @throws \Exception
     */
    private function validate(\WP_Term $term): \WP_Term {
        $names = $this->taxonomies->pluck(key: 'name');

        Assertion::of(value: $names->contains_value(value: $term->taxonomy))
            ->true(message: "Term with id '{$term->term_id}' not found with taxonomy: {$names}")
        ;

        return $term;
    }
}
