<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ExampleSlideController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('pages.slides.example');
    }
}
