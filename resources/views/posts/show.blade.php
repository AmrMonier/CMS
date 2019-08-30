@extends('layouts.theme')
@section('title', $post->title)
@section('content')
  <!-- Header -->
  <header class="header text-white h-fullscreen pb-80" style="  height: 100vh !important;  background-image: url({{ Storage::url($post->image) }});" data-overlay="9">
    <div class="container text-center">

      <div class="row h-100">
        <div class="col-lg-8 mx-auto align-self-center">

          <p class="opacity-70 text-uppercase small ls-1">{{ $post->category->name }}</p>
          <h1 class="display-4 mt-7 mb-8">{{ $post->title }}</h1>
          <p>
            <span class="opacity-70 mr-1">By</span>
            <a class="text-white" href="{{route('user.profile', $post->user->id)}}">{{ $post->user->name }}</a>
          </p>
          <p><img class="avatar avatar-sm" src="{{ Gravatar::src($post->user->email) }}" alt="{{ $post->user->name . 'Photos' }}"></p>

        </div>

        <div class="col-12 align-self-end text-center">
          <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
        </div>

      </div>

    </div>
  </header><!-- /.header -->


  <!-- Main Content -->
  <main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section" id="section-content">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">

            {!! $post->content !!}
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8 mx-auto">

            <div class="gap-xy-2 mt-6">
              @foreach ($post->Tags as $tag)
                <a class="badge badge-pill badge-secondary" href="#">{{ $tag->name }}</a>
              @endforeach
            </div>

          </div>
        </div>


      </div>
    </div>



    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
              <h2 class="text-center">Comments</h2>
            <div class="media-list">

            @foreach ($post->Comments as $comment)
              <div class="media">
                <img class="avatar avatar-sm mr-4" src="{{ Gravatar::src($comment->user->email) }}" alt="...">

                <div class="media-body">
                  <div class="small-1">
                    <strong>{{ $comment->user->name }}</strong>
                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">{{ $comment->created_at }}</time>
                  </div>
                  <p class="small-2 mb-0">{{ $comment->content }}</p>
                </div>
              </div>
            @endforeach

            </div>


            <hr>


            <form action="{{ route('comment.store') }}" method="POST">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <div class="form-group">
                <textarea class="form-control" placeholder="Comment" rows="4" name="content"></textarea>
              </div>

              <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
            </form>

          </div>
        </div>

      </div>
    </div>



  </main>
@endsection
