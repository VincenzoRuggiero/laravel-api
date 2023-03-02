<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $technologies = ['Html 5', 'CSS 3', 'Javascript', 'Bootstrap 5', 'Vue 3', 'Php', 'Laravel'];

        foreach ($technologies as $technologyName){
            $technology = new Technology();
            $technology->name = $technologyName;
            $technology->save();
        }
    }
}
