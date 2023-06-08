<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo;

use JWWS\WPPF\{
    Assertion\Boolean_Assertion\Boolean_Assertion,
    Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion,
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class User_Repo extends Repo {
    /**
     * Returns an object collection of all registered users.
     *
     * @return Collection<\WP_User>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_users(),
        );
    }

    /**
     * Retrieves user object by a given id.
     *
     * @throws \InvalidArgumentException
     */
    public function find_by_id(int $id): \WP_User {
        WordPress_Id_Assertion::of(id: $id)->is_valid();

        return self::get_user_by(field: 'id', value: $id);
    }

    /**
     * Retrieves user object by a given email.
     *
     * @throws \InvalidArgumentException
     */
    public function find_by_email(string $email): \WP_User {
        return $this->get_user_by(field: 'email', value: $email);
    }

    /**
     * Wrapper function for 'get_user_by()'. Replaces 'false' return type with
     * an exception.
     *
     * Retrieve user info by a given field.
     *
     * @param string     $field The field to retrieve the user with.
     *                          id | ID | slug | email | login.
     * @param int|string $value A value for $field.
     *                          A user ID, slug, email address, or login name.
     *
     * @throws \InvalidArgumentException if user not found
     */
    private function get_user_by(
        string $field,
        int|string $value,
    ): \WP_User {
        $user = get_user_by(field: $field, value: $value);

        Boolean_Assertion::of(boolean: $user)
            ->is_not_false(message: "User with {$field} '{$value}' not found.")
        ;

        return $user;
    }
}
