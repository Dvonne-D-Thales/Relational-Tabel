<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mapel>
 */
class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'IPA',
                'PPKN',
                'Seni Budaya',
                'Matematika',
                'IPS',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'PJOK',
                'TIK',
                'Prakarya',
                'Agama',
                'Sejarah',
                'Geografi',
                'Ekonomi',
                'Sosiologi',
                'Fisika',
                'Kimia',
                'filsafat',
            ]),
            'description' => $this->faker->sentence(15),
        ];
    }
}
