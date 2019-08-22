<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('category.index')->with('categories', Category::paginate(5));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data['name'] = request('name');
        $this->validator($data)->validate();
        Category::create($data);
        session()->flash('success', 'Category Created Successfully');
        return redirect('/category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return void
     */
    public function update(Category $category)
    {
        $data['name'] = \request('name');
        $this->validator($data)->validate();
        $category->name = $data['name'];
        $category->save();
        session()->flash('success', 'Category Updated Successfully');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return void
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $this->deletePosts($category);
        $category->delete();
        session()->flash('success', 'Category Deleted successfully with all its posts');
        return redirect('/category');
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'name' => 'required|string|min:3|max:15|unique:categories'
        ]);
    }

    protected function deletePosts(Category $category)
    {
        $posts = $category->posts;
        foreach ($posts as $post) {
          $post->forceDelete();
        }
    }
}
