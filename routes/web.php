<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Slides\ExampleSlideController;
use App\Http\Controllers\Slides\Feb2026SlideController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

$prefix = Config::get('slides.prefix', '');
$uri = $prefix ? trim($prefix, '/').'/slides' : 'slides';

Route::prefix($uri)->name('slides.')->group(function () {
    Route::get('/example', ExampleSlideController::class)->name('example');
    Route::get('/2026-02', Feb2026SlideController::class)->name('2026-02');
});
