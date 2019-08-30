@extends('layouts.theme')
@section('title', 'Category Update')
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
          <div class="card my-4 text-center">
              <div class="card-header">Edit category</div>
              <div class="card-body">
                  <form method="post" action="/category/{{$category->id}}">
                      @csrf
                      @method('PATCH')
                      <input type="text" class="form-control my-2" placeholder="Name..."
                             name="name" value="{{ $category->name }}">
                      <button type="submit" class="btn btn-outline-dark my-2">Update</button>
                      <a class="btn btn-outline-danger" href="/category">Cancel</a>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </main>

@stop
