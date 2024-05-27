<?php

namespace App\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasColor;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Filament\Support\Concerns\HasReorderAnimationDuration;

class TagList extends Field
{
    use Concerns\HasAffixes;
    use Concerns\HasExtraInputAttributes;
    use Concerns\HasNestedRecursiveValidationRules;
    use Concerns\HasPlaceholder;
    use HasColor;
    use HasExtraAlpineAttributes;
    use HasReorderAnimationDuration;

    /**
     * @var array<string> | Closure
     */
    protected array|Closure $splitKeys = [];

    protected string $view = 'forms.components.tag-list';

    /**
     * @param array<string> | Closure $keys
     */
    public function splitKeys(array|Closure $keys): static
    {
        $this->splitKeys = $keys;

        return $this;
    }

    /**
     * @return array<string>
     */
    public function getSplitKeys(): array
    {
        return $this->evaluate($this->splitKeys) ?? [];
    }
}
