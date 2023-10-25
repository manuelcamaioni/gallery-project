<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use Faker\Generator as Faker;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userIds = User::all()->pluck('id');
        for($i = 0; $i < 50; $i++){
            $newComment = new Comment();
            $newComment->text = $faker->text(rand(50, 200));
            $newComment->visible = true;
            $newComment->user_id = $faker->randomElement($userIds);
            $newComment->save();
        }
    }
}
