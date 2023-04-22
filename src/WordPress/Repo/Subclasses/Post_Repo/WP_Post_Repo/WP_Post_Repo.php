<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Post_Repo\Post_Repo,
    WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Post_Repo extends Repo implements Post_Repo {
    /**
     * @return self
     */
    public static function create(): self {
        return new self(
            types: WP_Post_Type_Repo::create()
                ->list_all(),
        );
    }

    /**
     * @param string $post_type_names
     *
     * @return self
     */
    public static function of(string ...$post_type_names): self {
        return new self(
            types: WP_Post_Type_Repo::create()
                ->list_all()
                ->filter_by_value(
                    callback: fn (\WP_Post_Type $type): bool => Collection::of(items: $post_type_names)
                        ->contains_value(value: $type->name),
                ),
        );
    }

    /**
     * @param Collection<\WP_Post_Type> $types
     *
     * @return void
     */
    private function __construct(private Collection $types) {
    }

    /**
     * @return Collection<\WP_Post>
     */
    public function list_all(): Collection {
        return Collection::of(
            items: get_posts(args: [
                'post_type' => $this->types
                    ->pluck(key: 'name')
                    ->to_array(),
                'numberposts' => -1,
                'post_status' => 'publish',
            ]),
        );
    }

    /**
     * @param int $id
     *
     * @return \WP_Post
     */
    public function find_by_id(int $id): \WP_Post {
        $post       = get_post(post: $id);
        $type_names = $this->types->pluck(key: 'name');

        if (! $type_names->contains_value(value: $post->post_type)) {
            throw new \Exception(
                message: "Post with id '{$id}' not found with post type '{$type_names->to_string()}'.",
            );
        }

        return get_post(post: $id);
    }
}
