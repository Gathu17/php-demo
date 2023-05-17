<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

        // $user = User::factory()->create();

        // $personal = Category::create(['name' => 'Personal', 'slug' => 'personal']);
        // $hobbies = Category::create(['name' => 'Hobbies', 'slug' => 'hobbies']);
        // $work = Category::create(['name' => 'Work', 'slug' => 'work']);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My Family Post',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec diam non odio. Ullamcorper ultricies turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus nec viverra turpis. Nulla eu sagittis ligula. Praesent purus</p>',
        //     'slug' => 'my-family-post',
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur...</p>',
        //     'published_at' => now(),
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $hobbies->id,
        //     'title' => 'My Hobbies Post',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec diam non odio. Ullamcorper ultricies turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus nec viverra turpis. Nulla eu sagittis ligula. Praesent purus</p>',
        //     'slug' => 'my-hobbies-post',
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur...</p>',
        //     'published_at' => now(),
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec diam non odio. Ullamcorper ultricies turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus nec viverra turpis. Nulla eu sagittis ligula. Praesent purus</p>',
        //     'slug' => 'my-work-post',
        //     'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur...</p>',
        //     'published_at' => now(),
        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}