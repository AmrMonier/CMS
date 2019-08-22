@extends('layouts.app')
@section('title', 'tag Update')
@section('content')
    <div class="card my-4 text-center">
        <div class="card-header">Edit Tag</div>
        <div class="card-body">
            <form method="post" action="{{route('tag.update', $tag->id) }}">
                @csrf
                @method('PATCH')
                <input type="text" class="form-control my-2" placeholder="Name..."
                       name="name" value="{{ $tag->name }}">
                <button type="submit" class="btn btn-outline-dark my-2">Update</button>
                <a class="btn btn-outline-danger" href="{{ route('tag.index') }}">Cancel</a>
            </form>
        </div>
    </div>
@stop
