@extends('layouts.app')
@section('title', 'Category Update')
@section('content')
    <div class="card my-4 text-center">
        <div class="card-header">Edit category</div>
        <div class="card-body">
            <form method="post" action="/category/{{$category->id}}">
                @csrf
                @method('PATCH')
                <input type="text" class="form-control my-2" placeholder="Name..."
                       name="name" value="{{ $category->name }}">
                <button type="submit" class="btn btn-outline-dark my-2">Update</button>
                <a class="btn btn-outline-danger" href="/category">Cancel</a>
            </form>
        </div>
    </div>
@stop
