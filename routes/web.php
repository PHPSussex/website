<?php

// Using Laravel Folio, see resources/views/pages for static routes.

use Illuminate\Support\Facades\Route;

Route::get('slides/{slide}', function () {
    return 'Boop';
});
