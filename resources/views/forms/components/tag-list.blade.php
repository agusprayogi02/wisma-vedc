@php
    use Filament\Support\Facades\FilamentView;

    $color = $getColor() ?? 'primary';
    $id = $getId();
    $isDisabled = $isDisabled();
    $statePath = $getStatePath();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <x-filament::input.wrapper
        :disabled="$isDisabled"
        :valid="! $errors->has($statePath)"
        :attributes="
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-fo-tags-input'])
        "
    >
        <div
            @if (FilamentView::hasSpaMode())
                ax-load="visible"
            @else
                ax-load
            @endif
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('tags-input', 'filament/forms') }}"
            x-data="tagsInputFormComponent({
                        state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$statePath}')") }},
                        splitKeys: @js($getSplitKeys()),
                    })"
            x-ignore
            {{ $getExtraAlpineAttributeBag() }}
        >
            <div
                @class([
                    '[&_.fi-badge-delete-button]:hidden' => $isDisabled,
                ])
            >
                <div wire:ignore>
                    <template x-cloak x-if="state?.length">
                        <div
                            @class([
                                'flex w-full flex-wrap gap-1.5 p-2',
                                'border-t border-t-gray-200 dark:border-t-white/10',
                            ])
                        >
                            <template
                                x-for="(tag, index) in state"
                                x-bind:key="`${tag}-${index}`"
                                class="hidden"
                            >
                                <x-filament::badge
                                    :color="$color"
                                >
                                    <span
                                        x-text="tag"
                                        class="select-none text-start"
                                    ></span>
                                </x-filament::badge>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </x-filament::input.wrapper>
</x-dynamic-component>
