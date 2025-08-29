<?php

namespace Tests\Feature\Settings;

use App\Models\Settings\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_adds_model_when_saving(): void
    {
        $setting = new class extends Setting {};
        $setting->save();

        $this->assertDatabaseCount($setting, 1);
        $class = $setting::class;
        $this->assertSame($class, $class::first()->model);
    }

    // phpcs:ignore
    public function test_modelClass_scope(): void
    {
        $other = new class extends Setting {};
        $other->save();
        $setting = new class extends Setting {};
        $setting->save();

        $this->assertDatabaseCount($setting, 2);
        $class = $setting::class;
        $this->assertSame($class, $class::first()->model);
    }
}
