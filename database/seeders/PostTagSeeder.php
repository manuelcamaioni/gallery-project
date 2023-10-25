<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Faker\Generator as Faker;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $postIds = Post::all()->pluck('id');
        $tagIds = Tag::all()->pluck('id');

        foreach($postIds as $postId){
            $post = Post::find($postId);

            $tagsToSync = $faker->randomElements($tagIds, rand(1, rand(2, count($tagIds))));
            $post->tags()->sync($tagsToSync);
        }
    }
}
