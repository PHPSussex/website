<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Slides\SlidesController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('slides/'.trim(Config::get('slides.prefix', ''), '/'))->group(function () {
    Route::get('/{view}', SlidesController::class);
});
