<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Slides\SlidesController;
use Illuminate\Support\Facades\Route;

use function App\slidesUrl;

Route::get('/', HomeController::class)->name('home');

Route::prefix(slidesUrl())->group(function () {
    Route::get('/{view}', SlidesController::class)->where('view', '.*')->name('slides');
});
