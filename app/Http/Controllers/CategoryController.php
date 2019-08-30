<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Exception as ExceptionAlias;
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
    public function show(Category $category)
    {
        return view('category.show')->with([
          'category'=> $category,
          'categories' => Category::all(),
          'tags' => Tag::paginate(6),
          'posts' => $category->posts()->simplePaginate(6)
        ]);
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
        $data['name'] = request('name');
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
     * @throws ExceptionAlias
     */
    public function destroy(Category $category)
    {
        $this->deletePosts($category);
        $category->delete();
        session()->flash('success', 'Category Deleted successfully with all its posts');
        return redirect('/category');
    }

    /**
     * Validations Rules of the request
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data,[
            'name' => 'required|string|min:3|max:20|unique:categories'
        ]);
    }

    /**
     * Delete Posts before deleting its category
     *
     * @param Category $category
     * @return void
     * @throws ExceptionAlias
     */
    protected function deletePosts(Category $category)
    {
        $posts = $category->posts;
        foreach ($posts as $post) {
          $post->forceDelete();
        }
    }
}
