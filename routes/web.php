<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Slides\SlidesController;
use Illuminate\Support\Facades\Route;

use function App\slidesUrl;

Route::get('/', HomeController::class)->name('home');
