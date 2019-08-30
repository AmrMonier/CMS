<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{

  function __construct(){
    $this->middleware('verifyCategory')->only(['create', 'store']);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')
        ->with('posts', Post::where('user_id',Auth::user()->id)->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with([
          'categories'=> Category::all(),
          'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $this->extractData($request);
        $data['image'] = $request->image->store('posts');
        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        session()->flash('success', 'Post Created Successfully');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with([
          'post' => $post,
          'categories' => Category::all(),
          'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param \App\Post $post
     * @return void
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $this->extractData($request);

        if($request->hasFile('image')){

            if(Storage::exists($post->image)) {
              Storage::delete($post->image);
          }
          $data['image'] = $request->image->store('posts');
        }

        $post->update($data);
        if($request->tags){
          $post->tags()->sync($request->tags);
        }
        session()->flash('success', 'Post Updated Successfully');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return void
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post  = Post::withTrashed()->where('id', $id)->first();
        if ($post->trashed()){
          $post->deleteImage();
          $post->forceDelete();
          session()->flash('success', 'Post Deleted Successfully');
        }else {
          $post->delete();
          session()->flash('success', 'Post Trashed Successfully');
        }

        return redirect()->back();
    }

    /**
     *  return all the trashed posts
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
      return view('posts.trashed')->with('posts', Post::onlyTrashed()->paginate(5));
    }

    /**
     * restore a soft Deleted post from the trash
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */

    public function restore($id)
    {
      $post  = Post::withTrashed()->where('id', $id)->first();
      $post->restore();
      session()->flash('success', 'Post Restored Successfully');
      return redirect()->back();
    }

    /**
     * restore all the deleted posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreAll()
    {
      $posts = Post::onlyTrashed()->get();
      foreach ($posts as $post) {
        $post->restore();
      }
      session()->flash('success', 'All Posts Restored Successfully');
      return redirect()->back();
    }

    /**
     * delete all the trashed posts Permanently
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
      $posts = Post::onlyTrashed()->get();
      foreach ($posts as $post) {
        $post->forceDelete();
      }
      session()->flash('success', 'All Posts Deleted Successfully');
      return redirect()->back();

    }

    /**
     * Extract the data sent in the request in array form
     * @param Request $request
     * @return array
     */
    protected function extractData(Request $request){
        return [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ];
    }
}
