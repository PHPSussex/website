<?php

namespace App\Http\Controllers\Slides;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\View\View;
use InvalidArgumentException;

class SlidesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $view): View
    {
        try {
            return view(
                Str::of($view)->replace('/', '.')->prepend('pages.slides.')->value(),
            );
        } catch (InvalidArgumentException) {
            abort(404);
        }
    }
}
