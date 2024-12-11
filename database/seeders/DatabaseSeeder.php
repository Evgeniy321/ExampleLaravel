<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $categores = Category::factory(10)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(100)->create();
        foreach ($posts as $post){
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }
        //dd($posts);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
