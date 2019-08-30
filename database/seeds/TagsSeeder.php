<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "Ajax", "Laravel", "Angular",
            "JQuery", "HTML5", "CSS",
            "Saas", "Java Script", "Lumen",
            "C++", "C#", "Java",
            "Kotlin", "PHP","VR",
            "AR", "Swift"
        ];
        foreach ($names as $name){
            $tag = ['name' => $name];
            Tag::create($tag);
        }
    }
}
