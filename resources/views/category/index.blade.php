@extends('layouts.app')
@section('title', 'Category')
@section('content')
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
                      <td>{{$category->name}}</td>
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
@section('side-content')
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
