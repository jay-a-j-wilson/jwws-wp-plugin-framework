<?php declare(strict_types=1);

namespace JWWS\WPPF\Dictionary\Standard_Dictionary;

use JWWS\WPPF\{
    Common\Security\Security,
    Dictionary\Dictionary
};

// Security::stop_direct_access();

final class Standard_Dictionary implements Dictionary {
    public static function new_instance(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct(readonly private array $entries = []) {}

    public function list_all(): array {
        return $this->entries;
    }

    public function find_by_key(string $key): string {
        if (isset($this->entries[$key])) {
            return $this->entries[$key];
        }

        throw new \InvalidArgumentException(
            message: "Entry with key of {$key} not found.",
        );
    }

    public function add(string $key, string $value): self {
        return new self(
            entries: [...$this->entries, ...[$key => $value]],
        );
    }

    public function remove(string $key): self {
        if (isset($this->entries[$key])) {
            return new self(
                entries: array_diff_assoc(
                    $this->entries,
                    [$key => $this->entries[$key]],
                ),
            );
        }

        throw new \InvalidArgumentException(
            message: "Entry with key of {$key} not found.",
        );
    }

    public function clear(): self {
        return new self();
    }

    public function count(): int {
        return count(value: $this->entries);
    }
}
