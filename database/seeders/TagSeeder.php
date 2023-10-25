<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{

    public function run(): void
    {
         $tags = ['Sport', 'Nature', 'News', 'Fashion', 'Science', 'Technology', 'Environment', 'Astrology', 'Politics'];
        foreach($tags as $tag){
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->save();
        }
    }
}
