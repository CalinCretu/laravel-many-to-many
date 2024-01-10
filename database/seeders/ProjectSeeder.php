<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $ids = $types->pluck('id');

        for ($i = 0; $i < 100; $i++) {
            $new_project = new Project();

            $new_project->name = $faker->name();
            $new_project->description = $faker->paragraph(4);
            $new_project->start_date = $faker->dateTimeThisCentury();
            $new_project->end_date = $faker->optional(0.7)->dateTimeThisCentury('+2 years');
            $new_project->status = $faker->randomElement(['Pending', 'Ongoing', 'Completed']);
            $new_project->type_id = $faker->optional()->randomElement($ids);

            $new_project->save();
        };
    }
}
