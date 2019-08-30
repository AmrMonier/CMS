@extends('layouts.theme')
@section('title', 'Edit Post')
@section('styleSheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
@endsection
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
              <div class="card-header">
                  Create Post
              </div>
              <div class="card-body">
                  <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data"  >
                      @csrf
                      @method('PATCH')

                      <div class="form-group">
                          <label for="title">Title:</label>
                          <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}">
                      </div>

                      <div class="form-group">
                          <label for="desc">Description:</label>
                          <textarea id="desc" class="form-control" name="description">{{ $post->description }}</textarea>
                      </div>

                      <div class="form-group">
                          <label for="content">Content:</label>
                          <input id="content" type="hidden" name="content" value="{{ $post->content }}">
                          <trix-editor input="content"></trix-editor>
                      </div>

                      <div class="form-group">
                          <label for="image">Cover :</label>
                          <img src="{{ asset('storage/'.$post->image) }}"
                           class="image-fluid image-thumbnail m-2"
                           width="100%">
                          <input type="file" id="image" class="form-control-file" name="image">
                      </div>
                      <div class="form-group">
                        <select class="custom-select" name="category">
                          <option selected>-------</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                              {{ $post->category->id == $category->id ? 'selected' : '' }}>
                              {{  $category->name }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Tag">Tag :</label>
                        <select class="custom-select tags-selector" id="Tag" name="tags[]" multiple>
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                              @if ($post->hasTag($tag))
                                selected
                              @endif>
                              {{  $tag->name }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-outline-success">Update</button>
                      <a class="btn btn-outline-danger" href="{{ route('post.index') }}">Cancel</a>
                  </form>
              </div>
              <div class="card-footer">

              </div>
          </div>
        </div>
      </div>
    </main>
@stop
@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.tags-selector').select2();
  });
  </script>
@endsection
