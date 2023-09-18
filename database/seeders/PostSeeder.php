<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json/posts.json");
        $posts = collect(json_decode($json));


        $posts->each(function ($post) {
            Post::create([
                'title' => $post->title,
                'slug' => $post->slug,
                'excerpt' =>  $post->excerpt,
                'description' => $post->description,
                'is_published' => $post->is_published,
                'min_to_read' => $post->min_to_read
            ]);
        });
    }
}
