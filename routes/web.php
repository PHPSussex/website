<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Slides\SlidesController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

$prefix = Config::get('slides.prefix', '');
$uri = $prefix ? trim($prefix, '/').'/slides' : 'slides';

Route::prefix($uri)->group(function () {
    Route::get('/{view}', SlidesController::class);
});
