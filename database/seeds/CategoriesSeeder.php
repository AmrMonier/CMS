<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "Web Development", "Mobile Development",
            "Web Security", "Networking",
            "Hacking","Cognitive Science"
        ];
        foreach ($names as $name){
            $item = ['name' => $name];
            Category::create($item);
        }
    }
}
