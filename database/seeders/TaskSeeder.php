<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Task::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'status' => $faker->randomElement(['pendente', 'concluída', 'cancelada']),
            ]);
        }
    }
}
