<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for($i = 0; $i < 10; $i++){
            $newUser = new User();
            $newUser->name = $faker->firstname();
            $newUser->email = $faker->email();
            $newUser->password = '12345678';
            $newUser->isAdmin = false;
            $newUser->active = true;
            $newUser->save();
        }
    }
}
