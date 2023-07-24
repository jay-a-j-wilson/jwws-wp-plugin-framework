<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo;

use JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use JWWS\WPPF\Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion;
use JWWS\WPPF\Collection\Collection;
use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\WPPF\WordPress\Repo\Repo;
use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo;

/**
 * ViewModel Repository.
 */
final class Post_Repo extends Repo {
    /**
     * @return Collection<\WP_Post>
     */
    public function list_all(): Collection {
        return Standard_Collection::of(
            ...get_posts(args: [
                'numberposts' => -1,
                'post_status' => 'publish',
                'post_type'   => Post_Type_Repo::new_instance()
                    ->list_all()
                    ->pluck(key: 'name')
                    ->to_array(),
            ]),
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function find_by_id(int $id): \WP_Post {
        WordPress_Id_Assertion::of(id: $id)->is_valid();

        $post = \WP_Post::get_instance(post_id: $id);

        Boolean_Assertion::of(boolean: $post)
            ->is_not_false(message: "Post with id '{$id}' not found.")
        ;

        return $post;
    }
}
