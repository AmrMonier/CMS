@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-center">Categories</div>
        <div class="card-body">
            <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    {{$category->name}}
                    <a class="btn btn-outline-secondary float-right mx-2" href="/category/{{ $category->id }}">Update</a>
                    <form class="float-right mx-2" action="/category/{{ $category->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="card-footer text-center">{{$categories->links()}}</div>
    </div>
@stop
@section('side-content')
    <div class="card my-4 text-center">
        <div class="card-header">Create category</div>
        <div class="card-body">
            <form method="post" action="/category/create">
                @csrf
                <input type="text" class="form-control my-2" placeholder="Name..." name="name">
                <button type="submit" class="btn btn-outline-dark my-2">Create</button>
            </form>
        </div>
    </div>
@stop