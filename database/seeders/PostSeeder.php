<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userIds = User::all()->pluck('id');

        for($i = 0; $i < 100; $i++){
            $newPost = new Post();
            $randomUserId= $faker->randomElement($userIds);
            $newPost->user_id = $randomUserId;
            $randomNumber = rand(1, 1000);
            $newPost->image = "https://unsplash.it/640/425?image={$randomNumber}";
            $newPost->visible = true;
            $newPost->save();
        }
    }
}
