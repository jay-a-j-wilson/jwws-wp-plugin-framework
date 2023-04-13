<?php

namespace JWWS\WPPF\WordPress\Repo\User_Repo\WP_User_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\User_Repo\User_Repo,
    Collection\Collection
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_User_Repo extends Repo implements User_Repo {
    /**
     * @param string $taxonomy
     *
     * @return self
     */
    public static function create(): self {
        return new self();
    }

    /**
     * @return Collection<\WP_User>
     */
    public function list_all(): Collection {
        return Collection::of(
            items: get_users(),
        );
    }

    /**
     * @param string $id
     *
     * @return \WP_User
     */
    public function find_by_id(int $id): \WP_User {
        return get_user_by(
            field: 'id',
            value: $id,
        );
    }
}
