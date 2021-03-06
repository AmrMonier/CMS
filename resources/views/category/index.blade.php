@extends('layouts.theme')
@section('title', 'Category')
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
            <div class="card my-4 text-center">
                <div class="card-header">Create category</div>
                <div class="card-body">

                    <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <input type="text" class="form-control my-2" placeholder="Name..." name="name">
                        <button type="submit" class="btn btn-outline-dark my-2">Create</button>
                    </form>
                </div>
            </div>
          </div>
          <div class="col-8">
            <div class="card">
                <div class="card-header text-center">Categories</div>
                <div class="card-body">
                    @if ($categories->count() > 0)
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">posts</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                            <tr>
                              <td>
                                <a href="{{ route('category.show', $category->id) }}">{{$category->name}}</a>
                              </td>
                              <td>{{ $category->posts->count() }}</td>
                              <td>
                                <a class="btn btn-outline-secondary float-right mx-2" href="{{ route('category.edit',$category->id) }}">Update</a>
                                <button class="btn btn-outline-danger float-right mx-2"
                                        data-toggle="modal" data-target="#deletingModal"
                                        onclick="confirmDelete({{ $category->id }})">
                                  Delete
                                </button>

                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <h1>There is no Categories...</h1>
                    @endif
                </div>
                <div class="card-footer text-center">{{$categories->links()}}</div>
            </div>
          </div>
      </div>
    </div>
  </div>
</main>


<!-- Modal -->
<div class="modal fade" id="deletingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are You Sure you want to <strong>DELETE</strong> this category..!!
        <form class="float-right mx-2" method="post" id="deletingForm">
            @csrf
            @method('DELETE')
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="deleteConfirmed()">Yes, Delete...</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
  <script>
      function confirmDelete(id) {
        console.log();
        $('#deletingForm').attr('action',window.location + '/' + id);
      }
      function deleteConfirmed() {
        $('#deletingForm').submit();
      }
  </script>
@endsection
