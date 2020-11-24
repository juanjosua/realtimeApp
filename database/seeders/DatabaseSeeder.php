<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->count(10)->create();
        \App\Models\Category::factory()->count(5)->create();
        // note: you have to seed category first, because questions need its id
        \App\Models\Question::factory()->count(10)->create();
        \App\Models\Reply::factory()->count(50)->create()->each(function($reply){
          return $reply->like()->save(\App\Models\Like::factory()->make());
        });
    }
}
