<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo;

use InvalidArgumentException;
use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo,
    WordPress\Repo\Subclasses\Post_Repo\Post_Repo,
    WordPress\Utility\Utility as WordPress,
    Assertion\Assertion
};
use WP_Post;

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
final class WP_Post_Repo extends Repo implements Post_Repo {
    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self(
            types: WP_Post_Type_Repo::create()
                ->list_all(),
        );
    }

    /**
     * Undocumented function.
     */
    public static function of(string ...$post_type_names): self {
        return new self(
            types: WP_Post_Type_Repo::create()
                ->list_all()
                ->filter_by_value(
                    callback: fn (\WP_Post_Type $type): bool => Collection::of(...$post_type_names)
                        ->contains_value(value: $type->name),
                ),
        );
    }

    /**
     * Undocumented function.
     *
     * @param Collection<\WP_Post_Type> $types
     *
     * @return void
     */
    private function __construct(private Collection $types) {
    }

    /**
     * Undocumented function.
     *
     * @return Collection<\WP_Post>
     */
    public function list_all(): Collection {
        return Collection::of(
            ...get_posts(args: [
                'post_type' => $this->types
                    ->pluck(key: 'name')
                    ->to_array(),
                'numberposts' => -1,
                'post_status' => 'publish',
            ]),
        );
    }

    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_Post {
        return $this->validate(post: WordPress::get_post(post: $id));
    }

    /**
     * Checks post is found with type.
     *
     * @throws \InvalidArgumentException
     */
    private function validate(\WP_Post $post): \WP_Post {
        $names = $this->types->pluck(key: 'name');

        Assertion::of(value: $names->contains_value(value: $post->post_type))
            ->true(message: "Post with id '{$post->ID}' not found with post type '{$names}'.")
        ;

        return $post;
    }
}
