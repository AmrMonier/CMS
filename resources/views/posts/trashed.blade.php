@extends('layouts.app')
@section('title', 'Posts')
@section('content')
  <div class="card">
      <div class="card-header text-center">
        <span class="d-block m-2">Trashed Posts</span>
        <form class="mx-2 d-inline" action="{{ route('post.restore-all') }}" method="get">
            @csrf
            <button type="submit" class="btn btn-success">Restore All</button>
        </form>
        <form class="mx-2 d-inline" action="{{ route('post.delete-all') }}" method="get">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger">Delete All</button>
        </form>

      </div>
      <div class="card-body">
          @if ($posts->count() > 0)
            <ul class="list-group">
              @foreach ($posts as $post)
                <li class="list-group-item">
                  <img src="{{ asset('storage/'.$post->image) }}"
                  class="img-thumbnail mx-2" alt="{{ $post->title }}"
                  width="80px" height="80px">
                    {{ $post->title }}
                     <form class="float-right mx-2" action="{{ route('post.restore',$post->id) }}" method="post">
                         @csrf
                         @method('PUT')
                         <button type="submit" class="btn btn-outline-secondary float-right mx-2">Restore</button>
                     </form>
                    <form class="float-right mx-2" action="{{ route('post.destroy',$post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </li>
              @endforeach
            </ul>
          @else
            <h1>The Trash is empty...</h1>
          @endif
      </div>
      <div class="card-footer text-center">{{ $posts->links() }}</div>
@stop
