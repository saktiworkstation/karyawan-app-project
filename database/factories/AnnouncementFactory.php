<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 8)),
            'user_id' => mt_rand(1, 5),
            'slug' => $this->faker->slug(),
            'body' => collect($this->faker->paragraphs(mt_rand(1, 2)))->map(fn ($p) => "<p>$p</p>")->implode(''),
        ];
    }
}
