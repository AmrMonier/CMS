<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
class verifyCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Category::all()->count() === 0){
        session()->flash('error','You need to create a category to be able to create posts');
        return redirect(route('category.index'));
      }
        return $next($request);
    }
}
