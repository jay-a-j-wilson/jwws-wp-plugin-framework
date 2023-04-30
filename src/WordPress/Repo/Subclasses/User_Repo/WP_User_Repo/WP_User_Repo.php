<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\User_Repo\User_Repo,
    Assertion\Assertion,
    WordPress\Utility\Utility as WordPress,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_User_Repo extends Repo implements User_Repo {
    /**
     * Factory method
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Returns an object collection of all registered users.
     *
     * @return Collection<\WP_User>
     */
    public function list_all(): Collection {
        return Collection::of(
            items: get_users(),
        );
    }

    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_User {
        return WordPress::get_user_by(
            field: 'id',
            value: $id,
        );
    }
}
