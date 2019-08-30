@extends('layouts.theme')

@section('title', 'Settings')

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
      Change Password
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('user.updatePassword') }}">
          @csrf
          @method('PATCH')
          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              </div>
          </div>

          <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

          <div class="form-group row">
              <label for="old-password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

              <div class="col-md-6">
                  <input id="old-password" type="password" class="form-control"
                   name="old_password" required >
              </div>
          </div>
          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      Change Password
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