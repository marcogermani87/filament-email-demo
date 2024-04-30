<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['field','hasInlineLabel'])
<x-filament-forms::field-wrapper :field="$field" :has-inline-label="$hasInlineLabel" >
<x-slot name="label" class="">{{ $label }}</x-slot>
{{ $slot ?? "" }}
</x-filament-forms::field-wrapper>