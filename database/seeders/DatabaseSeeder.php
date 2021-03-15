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
        // \App\Models\Post::factory(25)->create();
        $this->call([
            // UserSeeder::class,
            PostSeeder::class,
            // CommentSeeder::class,
        ]);
    }
}
