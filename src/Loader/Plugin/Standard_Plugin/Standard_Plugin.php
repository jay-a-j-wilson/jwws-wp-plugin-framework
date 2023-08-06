<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin;

use JWWS\WPPF\Collection\Collection;
use JWWS\WPPF\Collection\Standard_Collection\Standard_Collection;
use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;
use JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta;
use JWWS\WPPF\Template\Template;

// Security::stop_direct_access();

final class Standard_Plugin implements Plugin {
    public static function of_slug(
        string $slug,
        string $fallback_name,
    ): static {
        return self::of_basename(
            basename: "{$slug}/{$slug}.php",
            fallback_name: $fallback_name,
        );
    }

    public static function of_basename(
        string $basename,
        string $fallback_name,
    ): static {
        return new static(
            basename: Basename::of(basename: $basename),
            name: Name::of(
                basename: $basename,
                fallback_name: $fallback_name,
            ),
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private readonly Basename $basename,
        private readonly Name $name,
    ) {
        $this->dependencies = Standard_Collection::new_instance();
    }

    private readonly Collection $dependencies;

    public function basename(): Basename {
        return $this->basename;
    }

    public function name(): Name {
        return $this->name;
    }

    public function dependencies(): Collection {
        return $this->dependencies;
    }

    public function activate(): static {
        activate_plugin(plugin: $this->basename->__toString());

        return $this;
    }

    public function deactivate(): static {
        deactivate_plugins(plugins: $this->basename->__toString());

        return $this;
    }

    public function is_active(): bool {
        return is_plugin_active(plugin: $this->basename->__toString());
    }

    public function is_inactive(): bool {
        return ! $this->is_active();
    }

    public function can_activate(): bool {
        return $this->has_no_inactive_dependencies();
        // return current_user_can(capability: 'activate_plugins')
        // && $this->has_no_inactive_dependencies();
    }

    public function basename_equals(string $basename): bool {
        return $this->basename->__toString() === $basename;
    }

    public function add_dependencies(Plugin ...$plugins): static {
        $this->dependencies->add(...$plugins);

        return $this->append_dependencies_to_listing();
    }

    public function dependencies_names(): Collection {
        return $this->dependencies
            ->map(
                callback: fn (self $dependency) => $dependency
                    ->name()
                    ->__toString(),
            )
        ;
    }

    public function contains_dependency(string $basename): bool {
        return $this->dependencies
            ->map(
                callback: fn (self $dependency) => $dependency
                    ->basename()
                    ->__toString(),
            )
            ->contains_value(value: $basename)
        ;
    }

    public function active_dependencies(): Collection {
        return $this->dependencies
            ->filter_by_value(
                callback: fn (self $dependant): bool => $dependant->is_active(),
            )
        ;
    }

    public function inactive_dependencies(): Collection {
        return $this->dependencies
            ->filter_by_value(
                callback: fn (self $dependant): bool => ! $dependant->is_active(),
            )
        ;
    }

    public function has_dependencies(): bool {
        return $this->dependencies->count() > 0;
    }

    public function has_active_dependencies(): bool {
        return $this->active_dependencies()->count() > 0;
    }

    public function has_inactive_dependencies(): bool {
        return $this->inactive_dependencies()->count() > 0;
    }

    public function has_no_active_dependencies(): bool {
        return $this->active_dependencies()->count() === 0;
    }

    public function has_no_inactive_dependencies(): bool {
        return $this->inactive_dependencies()->count() === 0;
    }

    public function append_dependencies_to_listing(): static {
        Plugin_Row_Meta::of(plugin: $this)->hook();

        return $this;
    }

    public function render_dependencies(): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                key: 'plugin_names',
                value: $this
                    ->dependencies_names()
                    ->implode(),
            )
            ->output()
        ;
    }
}
