<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i < 50; $i++){
            $newProject = new Project();
            $newProject->title = $faker->words(rand(1, 10), true);
            $newProject->description = $faker->paragraph(10, true);
            $newProject->slug = $faker->slug();
            $newProject->date = $faker->date();
            $newProject->image = $faker->imageUrl(480, 360, 'post', true, 'posts', true, 'png');
            $newProject->save();
        }
    }
}
