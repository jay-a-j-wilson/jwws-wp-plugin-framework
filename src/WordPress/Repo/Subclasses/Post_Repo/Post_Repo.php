<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use JWWS\WPPF\{
    Assertion\Assertion,
    Collection\Collection,
    WordPress\Repo\Repo,
    WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo,
    WordPress\Utility\Utility as WordPress
};

/**
 * ViewModel Repository.
 */
final class Post_Repo extends Repo {
    /**
     * Creates repo containing all posts.
     */
    public static function create(): self {
        return new self(
            types: Post_Type_Repo::create()
                ->list_all(),
        );
    }

    /**
     * Creates repo only containing specified post types.
     */
    public static function of(string ...$post_type_names): self {
        foreach ($post_type_names as $post_type_name) {
            String_Assertion::of($post_type_name)->not_empty();
        }

        return new self(
            types: Post_Type_Repo::create()
                ->list_all()
                ->filter_by_value(
                    callback: fn (\WP_Post_Type $type): bool => 
                        Collection::of(...$post_type_names)
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
            ...get_posts(args: [
                'post_type'   => $this->post_types(),
                'numberposts' => -1,
                'post_status' => 'publish',
            ]),
        );
    }

    private function post_types(): string|array {
        return $this->types->is_empty()
            ? 'any'
            : $this->types
                ->pluck(key: 'name')
                ->to_array()
            ;
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
