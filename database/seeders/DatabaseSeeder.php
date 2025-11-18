<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Mapel;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GuardianSeeder::class,
            ClassroomSeeder::class,
            StudentsSeeder::class,
        ]);

        // Buat 5 mapel, dan untuk setiap mapel buat 1 guru
        $mapels = Mapel::factory(18)->create();

        $mapels->each(function ($mapel) {
            Teacher::factory()->create([
                'id_mapel' => $mapel->id,
            ]);
        });
    }
}
