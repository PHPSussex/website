<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SlidesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $view): View
    {
        return view(
            Str::of($view)->replace('/', '.')->prepend('pages.slides.')->value(),
        );
    }
}
