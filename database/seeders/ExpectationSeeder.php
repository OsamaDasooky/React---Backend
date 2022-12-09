<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Expectation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpectationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = DB::table('users')->pluck('id');
        foreach (range(1, 50) as $index) {

            Expectation::create([
                'user_id' => $faker->randomElement($users),
                'expect' => '1-5',
            ]);
        }
    }
}
