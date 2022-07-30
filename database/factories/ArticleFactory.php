<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(5);
        return [
            'title' => $title,
            // 'text' => fake()->realTextBetween($minNbChars = 200, $maxNbChars = 300),
            'text' => fake()->paragraphs(4),
            'slug' => Str::slug($title),
            'created_at' => fake()->dateTimeBetween('-1 months', '+0 days'),
        ];
    }
}
