@extends('layouts.theme')

@section('title', 'Settings')

@section('styleSheets')
  <style>
      #navigation-list{
        display: none;
      }
  </style>
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
                <div class="row">
                    <div class="col-4">
                        <div class="list-group" >

                            <a class="list-group-item list-group-item-action" href="{{ route('user.settings') }}">Profile</a>
                            <a class="list-group-item list-group-item-action" href="{{ route('user.changePassword') }}">Password</a>

                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                Settings
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.update', $user->id) }}">
                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name" required autofocus value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" required value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="bio" name="bio" class="form-control" required>{{ $user->bio }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                                   required >
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

@section('side-content')

@endsection
