@extends('layouts.theme')
@section('title', 'user')
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
                <div class="card-header text-center">users</div>
                <div class="card-body">
                    @if ($users->count() > 0)
                      <table class="table">
                        <thead>
                          <tr>
                            <th></th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>
                                <img src="{{ Gravatar::src($user->email,40) }}" class="img-thumbnail rounded-circle">
                              </td>
                              <td>{{$user->name}}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                @if (!$user->hasRole('admin'))
                                  <button class="btn btn-outline-danger  mx-2"
                                          data-toggle="modal" data-target="#deletingModal"
                                          onclick="confirmpromotion({{ $user->id }})">
                                    Make Admin
                                  </button>
                                @else
                                  <p class="lead">this user is an Admin</p>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <h1>There is no users...</h1>
                    @endif
                </div>
                <div class="card-footer text-center">{{$users->links()}}</div>
            </div>
            <div class="modal fade" id="deletingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">promote</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are You Sure you want to <strong>Promote</strong> this user as <strong>Admin</strong>..!!
                    <form class="float-right mx-2" method="post" id="promotingForm">
                        @csrf
                        @method('PATCH')
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="promotionConfirmed()">Yes, Promote...</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</main>
@stop
@section('scripts')
  <script>
      function confirmpromotion(id) {
        $('#promotingForm').attr('action',window.location + '/' + id + '/promote');
      }
      function promotionConfirmed() {
        $('#promotingForm').submit();
      }
  </script>
@endsection
