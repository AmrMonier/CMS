@extends('layouts.theme')
@section('title',$user->name)
@section('content')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Latest Blog Posts</h1>
                    <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
              @include('partials.msgs')
              
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">

                            <img src="{{ Gravatar::src($user->email,200) }}" alt="{{ $user->name }}"
                                 class="img-thumbnail rounded-circle" style="background-color: #343434;border-color: #0b0b0b ">

                            <hr>

                            <h6 class="sidebar-title text-center">{{ $user->name }}</h6>
                            <p class="small-1" style="font-size: 18px">
                                {{ $user->bio }}
                            </p>
                            <p class="small-2">
                                <a href="mailto:{{ $user->email }}">
                                <i class="fa ti-email"></i> {{ $user->email }}
                                </a>
                            </p>

                        </div>
                    </div>
                    <div class="col-md-8 col-xl-9">
                        @if (Auth::user()->id == $user->id)
                            <a class="btn btn-outline-success my-2" href="{{ route('post.create') }}">Create New Post</a>

                        @endif
                        <div class="row gap-y">
                            @forelse ($posts as $post )
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
                                            <div class="card-footer">
                                              <a class="btn btn-outline-primary float-right mx-2 float-left"
                                               href="{{ route('post.edit',$post->id) }}">Update</a>
                                              <form class="float-right mx-2" action="{{ route('post.destroy',$post->id) }}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-outline-danger">Trash</button>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="lead text-center">
                                    there is no result for the search
                                    <strong>{{ request()->query('search') }}</strong>
                                </p>

                            @endforelse
                        </div>
                        {{ $posts->appends(['search' => request()->query('search')])->links() }}
                    </div>


                </div>
            </div>
        </div>
    </main>
@endsection
