<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function test_it_returns_home_view(): void
    {
        $controller = new HomeController;
        $response = $controller();

        $this->assertEquals('pages.index', $response->name());
    }

    public function test_it_is_registered_as_home_route(): void
    {
        $route = Route::getRoutes()->getByName('home');

        $this->assertNotNull($route);
        $this->assertEquals('/', $route->uri());
        $this->assertEquals(HomeController::class, $route->getActionName());
    }

    public function test_it_responds_to_get_requests(): void
    {
        $route = Route::getRoutes()->getByName('home');

        $this->assertContains('GET', $route->methods());
    }
}
