<?php

use Illuminate\Database\Seeder;
use App\Tag;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = Tag::all();
      factory(App\Post::class, 20)->create()->each(function ($post) {
        $tags = Tag::all()->pluck('id')->all();
        $randomTags = array_rand($tags, 3);
        $tt = array();
        foreach ($randomTags as $key => $value) {
          array_push($tt, $tags[$value]);
        }
        $post->tags()->attach($tt);
      }
    );
    }
}
