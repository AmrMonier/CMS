@extends('layouts.theme')
@section('title', 'Posts')
@section('content')
  <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
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
                        <img src="{{ Storage::url($post->image) }}"
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
          </div>
        </div>
      </main>
@stop
