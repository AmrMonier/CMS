@extends('layouts.authentication')

@section('title', 'Register')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Create an account</h5>

        <form  method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Your Name">
            @error('name')
                <span class="badge badge-danger m-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
            @error('email')
                <span class="badge badge-danger m-2" role="alert">
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

          <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Password (confirm)">
          </div>



          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div>
        </form>
        <hr class="w-30">

        <p class="text-center text-muted small-2">Already a member? <a href="{{ route('login') }}">Login here</a></p>
      </div>

    </main><!-- /.main-content -->
@endsection
