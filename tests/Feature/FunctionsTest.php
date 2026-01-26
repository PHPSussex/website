<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

use function App\slidesUrl;
use function App\variant;

class FunctionsTest extends TestCase
{
    #[Test]
    public function it_resolves_single_variant(): void
    {
        $variants = [
            'primary' => 'text-blue-500',
            'secondary' => 'text-gray-500',
        ];

        $result = variant('primary', $variants);

        $this->assertEquals(['text-blue-500'], $result);
    }

    #[Test]
    public function it_resolves_multiple_variants(): void
    {
        $variants = [
            'primary' => 'text-blue-500',
            'bold' => 'font-bold',
            'large' => 'text-xl',
        ];

        $result = variant('primary bold', $variants);

        $this->assertEquals(['text-blue-500', 'font-bold'], $result);
    }

    #[Test]
    public function it_ignores_unknown_variants(): void
    {
        $variants = [
            'primary' => 'text-blue-500',
            'bold' => 'font-bold',
        ];

        $result = variant('primary unknown bold', $variants);

        $this->assertEquals(['text-blue-500', 'font-bold'], $result);
    }

    #[Test]
    public function it_handles_empty_variant_string(): void
    {
        $variants = [
            'primary' => 'text-blue-500',
        ];

        $result = variant('', $variants);

        $this->assertEquals([], $result);
    }

    #[Test]
    public function it_trims_whitespace_from_variants(): void
    {
        $variants = [
            'primary' => 'text-blue-500',
            'bold' => 'font-bold',
        ];

        $result = variant(' primary   bold ', $variants);

        $this->assertEquals(['text-blue-500', 'font-bold'], $result);
    }
}
