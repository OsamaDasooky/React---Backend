<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ArticleSeeder extends Seeder
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
            // $users = User::orderByRaw("RAND")->pluck('id');;
            Article::create([

                'list_title' => $faker->words(),
                // 'list_author' => $faker->firstName(),
                'list_published_date' => $faker->dateTime($max = 'now'),
                'list_published_date_precision' => $faker->dateTime($max = 'now'),
                'list_link' => $faker->url(),
                'list_clean_url' => $faker->url(),
                'list_excerpt' => $faker->paragraph(),
                'list_summary' => $faker->paragraph(),
                'list_rights' => $faker->sentences(),
                'list_rank' => $faker->numberBetween($min = 0, $max = 10),
                'list_topic' => $faker->sentences(),
                'list_country' => $faker->country(),
                'list_language' => $faker->languageCode(),
                // 'list_authors' => $faker->sentences(),
                'list_media' => $faker->imageUrl($width = 640, $height = 480),
                'list_is_opinion' => $faker->boolean(),
                'list_twitter_account' => $faker->sentences(),
                'list_score' => $faker->numberBetween($min = 0, $max = 10),

            ]);
        }
    }
}
