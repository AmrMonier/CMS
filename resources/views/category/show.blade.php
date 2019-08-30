@extends('layouts.theme')
@section('title', $category->name )
@section('content')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>{{ $category->name }}</h1>
            <p class="lead-2 opacity-90 mt-6">{{ $category->name }} Contains {{ $category->posts()->count() }} posts</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
            @foreach ($posts as $post )



                  <div class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="{{ route('post.show', $post->id) }}">
                        <img class="card-img-top" src="{{ asset('storage/'.$post->image) }}" alt="Card image cap"></a>
                      <div class="p-6 text-center">
                        <p>
                          <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                            {{ $post->category->name }}
                          </a>
                        </p>
                        <h5 class="mb-0">
                          <a class="text-dark" href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                        </h5>
                      </div>
                    </div>
                  </div>

            @endforeach
            </div>
              {{ $posts->links() }}
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                @include('partials.search')

                <hr>

                @include('partials.categories')



                  <hr>

                  @include('partials.tags')

                <hr>

                <h6 class="sidebar-title">About</h6>
                <p class="small-3">
                  This Blog is a CMS created by Amr Monier with Laravel And
                   <i class="fa fa-heart" style="color:red"></i>
                 </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection
