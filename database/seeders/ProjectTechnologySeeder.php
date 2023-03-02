<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $projects = Project::all();

        $techIds = Technology::all()->pluck('id');

        foreach ($projects as $project) {
            $project->technologies()->attach($faker->randomElements($techIds, 3));
        }
    }
}
