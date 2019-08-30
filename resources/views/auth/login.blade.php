@extends('layouts.authentication')

@section('title', 'Login')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Sign into your account</h5>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}">
            @error('email')
                <span class="badge badge-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            @error('password')
                <span class="badge badge-danger m-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group flexbox py-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" checked>
              <label class="custom-control-label">Remember me</label>
            </div>
            @if (Route::has('password.request'))
              <a class="text-muted small-2" href="{{ route('password.request') }}">Forgot password?</a>

            @endif
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
          </div>
        </form>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
      </div>

    </main><!-- /.main-content -->
@endsection
