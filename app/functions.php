<?php

namespace App;

use Exception;
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
