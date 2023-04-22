<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\User_Repo\User_Repo
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_User_Repo extends Repo implements User_Repo {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Undocumented function.
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
     *
     * @param string $id
     */
    public function find_by_id(int $id): \WP_User {
        return get_user_by(
            field: 'id',
            value: $id,
        );
    }
}
