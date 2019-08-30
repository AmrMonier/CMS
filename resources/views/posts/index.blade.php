@extends('layouts.theme')
@section('title', 'Posts')
@section('content')  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
    <div class="container">

      <div class="row">
        <div class="col-md-8 mx-auto">

          <h1>Latest Blog Posts</h1>
          <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

        </div>
      </div>

    </div>
  </header>

  <main class="main-content">
    <div class="section bg-gray">
      <div class="container">
        @include('partials.msgs')
        <div class="card">
            <div class="card-header text-center">
              <span class="d-block m-2">Posts</span>
              <a class="btn btn-outline-success" href="{{ route('post.create') }}">Create New Post</a>
            </div>
            <div class="card-body">
                @if ($posts->count()>0)
                  <ul class="list-group">
                    @foreach ($posts as $post)
                      <li class="list-group-item">
                        <img src="{{ Storage::url($post->image) }}"
                        class="img-thumbnail mx-2" alt="{{ $post->title }}"
                        width="80px" height="80px">
                          <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                          <a class="btn btn-outline-secondary float-right mx-2"
                           href="{{ route('post.edit',$post->id) }}">Update</a>
                          <form class="float-right mx-2" action="{{ route('post.destroy',$post->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger">Trash</button>
                          </form>
                      </li>
                    @endforeach
                  </ul>
                @else
                  <h1>There is no posts...</h1>
                @endif
            </div>
            <div class="card-footer text-center">{{ $posts->links() }}</div>
          </div>
        </div>
      </main>
@stop
