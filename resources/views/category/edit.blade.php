@extends('layouts.app')
@section('content')
    <div class="card my-4 text-center">
        <div class="card-header">Edit category</div>
        <div class="card-body">
            <form method="post" action="/category/{{$category->id}}">
                @csrf
                @method('PATCH')
                <input type="text" class="form-control my-2" placeholder="Name..."
                       name="name" value="{{ $category->name }}">
                <button type="submit" class="btn btn-outline-dark my-2">Create</button>
            </form>
        </div>
    </div>
@stop