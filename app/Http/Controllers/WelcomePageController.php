<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Auth;


class WelcomePageController extends Controller
{
    public function index()
    {
      if(Auth::check()){
        $search = request()->query('search');
        if($search){
          $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(6);

        }else {
          $posts = Post::simplePaginate(6);
        }

        return view('welcome')->with([
          'posts' => $posts,
          'categories' => Category::paginate(6),
          'tags' => Tag::paginate(6),

        ]);
       }
       else {
         return redirect(route('guest-welcome'));
       }
    }
    function guestWelcome()
   {
     return view('guest-welcome');
   }

}
