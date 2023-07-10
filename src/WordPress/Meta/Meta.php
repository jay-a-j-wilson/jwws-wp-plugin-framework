<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta;

use JWWS\WPPF\{
    Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion,
    Common\Security\Security,
    WordPress\Meta\Enums\Type
};

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 */
abstract class Meta {
    /**
     * Factory method.
     *
     * @throws \InvalidArgumentException
     */
    final public static function of(int $id): self {
        WordPress_Id_Assertion::of(id: $id)->is_valid();

        return new static(
            id: $id,
        );
    }

    /**
     * Returns the meta_type.
     */
    abstract protected static function meta_type(): Type;

    /**
     * @return void
     */
    final protected function __construct(readonly protected int $id) {}

    /**
     * Retrieves all meta fields.
     */
    final public function list_all(): mixed {
        return get_metadata(
            meta_type: static::meta_type()->value,
            object_id: $this->id,
        );
    }

    /**
     * Retrieves a meta field with the given key.
     */
    final public function find_by_key(string $key, bool $single = true): mixed {
        return get_metadata(
            meta_type: static::meta_type()->value,
            object_id: $this->id,
            meta_key: $key,
            single: $single,
        );
    }
}
