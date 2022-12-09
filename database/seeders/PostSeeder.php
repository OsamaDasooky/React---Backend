<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 50) as $index) {

            Post::create([

                'Competition' =>  $faker->sentence(),
                'result' => $faker->word(),
                'team_2' => $faker->country(),
                'team_1' => $faker->country(),
            ]);
        }
    }
}
