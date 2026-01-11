<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class Feb2026SlideController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('pages.slides.2026-02');
    }
}
