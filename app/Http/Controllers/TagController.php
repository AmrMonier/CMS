<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('tag.index')->with('tags', Tag::paginate(5));
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
        Tag::create($data);
        session()->flash('success', 'Tag Created Successfully');
        return redirect(route('tag.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $Tag
     * @return void
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $Tag
     * @return void
     */
    public function show(Tag $tag)
    {
        return view('tag.show')->with([
          'tag'=> $tag,
          'categories' => Category::all(),
          'tags' => Tag::paginate(6),
          'posts' => $tag->posts()->simplePaginate(6)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Tag $Tag
     * @return void
     */
    public function update(Tag $tag)
    {
        $data['name'] = \request('name');
        $this->validator($data)->validate();
        $tag->update($data);
        session()->flash('success', 'Tag Updated Successfully');
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $Tag
     * @return void
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        // $this->deletePosts($tag);
        $tag->delete();
        session()->flash('success', 'Tag Deleted successfully with all its posts');
        return redirect(route('tag.index'));
    }

    protected function validator(array $data){
        return Validator::make($data,[
            'name' => 'required|string|min:2|max:20|unique:tags'
        ]);
    }

    // protected function deletePosts(Tag $tag)
    // {
    //     $posts = $tag->posts;
    //     if ($posts->count() !== 0)
    //     foreach ($posts as $post) {
    //       $post->forceDelete();
    //     }
    // }
}
