<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SlidesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $view): View
    {
        return view("pages.slides.{$view}");
    }
}
