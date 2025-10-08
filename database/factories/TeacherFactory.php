<?php

namespace Database\Factories;

use App\Models\mapel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\teacher>
 */
class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_mapel' => mapel::doesntHave('teacher')->inRandomOrder()->first()?->id,
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
        ];
    }
}

