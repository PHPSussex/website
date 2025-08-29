<?php

namespace App;

use Illuminate\Support\Str;

function setting($name): mixed
{
    $class = Str::of($name)->studly()->prepend('App\\Models\\Settings\\')->value();

    return $class::first()->value;
}
