@extends('layouts.app')
@section('title', 'Posts')
@section('content')
  <div class="card">
      <div class="card-header text-center">
        <span class="d-block m-2">Posts</span>
        <a class="btn btn-outline-success" href="/post/create">Create New Post</a>
      </div>
      <div class="card-body">
          @if ($posts->count()>0)
            <ul class="list-group">
              @foreach ($posts as $post)
                <li class="list-group-item">
                  <img src="{{ asset('storage/'.$post->image) }}"
                  class="img-thumbnail mx-2" alt="{{ $post->title }}"
                  width="80px" height="80px">
                    {{ $post->title }}
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
@stop
