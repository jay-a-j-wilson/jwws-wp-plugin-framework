<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo;

use JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use JWWS\WPPF\Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion;
use JWWS\WPPF\Collection\Collection;
use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\WordPress\Repo\Repo;
use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class Term_Repo extends Repo {
    /**
     * @return Collection<\WP_Term>
     */
    public function list_all(): Collection {
        return Standard_Collection::of(
            ...get_terms(args: [
                'hide_empty' => false,
                'taxonomy'   => Taxonomy_Repo::new_instance()
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
