<?php

namespace App;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

function setting($name): mixed
{
    $class = Str::of($name)->studly()->prepend('App\\Models\\Settings\\')->value();
    $instance = $class::first();

    if (is_null($instance)) {
        throw new Exception("Setting '$name' not found.");
    }

    return $instance->value;
}

function variant(string $variant, array $variants): array
{
    $variantKeys = Collection::make(explode(' ', $variant))
        ->map(fn (string $variant) => trim($variant))
        ->filter()
        ->toArray();

    return array_values(Arr::only($variants, $variantKeys));
}
