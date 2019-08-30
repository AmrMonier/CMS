@extends('layouts.theme')
@section('title', 'Create Post')
@section('styleSheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet">
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
                  <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                          <label for="title">Title:</label>
                          <input type="text" id="title" class="form-control" name="title">
                      </div>

                      <div class="form-group">
                          <label for="desc">Description:</label>
                          <textarea id="desc" class="form-control" name="description"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="content">Content:</label>
                          <input id="content" type="hidden" name="content">
                          <trix-editor input="content"></trix-editor>
                      </div>

                      <div class="form-group">
                          <label for="image">Cover :</label>
                          <input type="file" id="image" class="form-control-file" name="image">
                      </div>
                      <div class="form-group">
                        <label for="category">Category :</label>
                        <select class="custom-select" id="category" name="category">
                          <option selected disabled>-------</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{  $category->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="Tag">Tag :</label>
                        <select class="custom-select tags-selector3" id="Tag" name="tags[]" multiple>
                          @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{  $tag->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <button type="submit" class="btn btn-outline-success">Create</button>
                      <a href="{{ route('post.index') }}" class="btn btn-outline-danger">Cancel</a>
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
        $('.tags-selector3').select2();
      });
  </script>
@endsection
