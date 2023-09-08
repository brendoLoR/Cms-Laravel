<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class BlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data' => [
                'assets' => [],
                'styles' => [],
                'components' => [],
                'pages' => [[
                    'id' => 'page-1',
                    'name' => 'Block'
                ]],
            ],
            'weight' => 0
        ];
    }
}
