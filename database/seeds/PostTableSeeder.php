<?php

use App\Post;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $faker = Factory::create('zh_TW');

        foreach(range(20, 1) as $number) {
            Post::create([
                'title' => $faker->sentence,
                'sub_title' => $faker->sentence,
                'content' => $faker->paragraph,
                'is_feature' => rand(0, 1),
                'page_view' => rand(0, 1000),
                'created_at' => Carbon::now()->subDays($number),
                'updated_at' => Carbon::now()->subDays($number),
            ]);
        }
    }
}

