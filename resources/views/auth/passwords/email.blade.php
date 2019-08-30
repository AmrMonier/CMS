@extends('layouts.authentication')

@section('title', 'Reset Password')

@section('content')
  <main class="main-content">

    <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
      <h5 class="mb-6">Recover your password</h5>

      <form class="input-line1" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email Address">
          @error('email')
              <span class="badge badge-danger m-2" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <button class="btn btn-lg btn-block btn-primary" type="submit">Reset Password</button>
      </form>

    </div>

  </main><!-- /.main-content -->
@endsection
