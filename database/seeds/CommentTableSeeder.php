<?php

use App\Comment;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();

        $faker = Factory::create('zh_TW');

        foreach(range(1, 15) as $number) {
            Comment::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'content' => $faker->paragraph,
                'post_id' => rand(1, 10),
            ]);
        }
    }
}
