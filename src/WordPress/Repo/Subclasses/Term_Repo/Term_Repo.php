<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo;

use JWWS\WPPF\{
    Assertion\Boolean_Assertion\Boolean_Assertion,
    Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion,
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Term_Repo extends Repo {
    /**
     * @return Collection<\WP_Term>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_terms(args: [
                'hide_empty' => false,
                'taxonomy'   => Taxonomy_Repo::create()
                    ->list_all()
                    ->pluck(key: 'name')
                    ->to_array(),
            ]),
        );
    }

    /**
     * @throws \InvalidArgumentException if not found
     */
    public function find_by_id(int $id): \WP_Term {
        WordPress_Id_Assertion::of(id: $id)->is_valid();

        $term = \WP_Term::get_instance(term_id: $id);

        Boolean_Assertion::of(boolean: $term)
            ->is_not_false(message: "Term with id '{$id}' not found.")
        ;

        return $term;
    }
}
