@extends('layouts.app')
@section('title', 'Show Post')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <img src="{{$post->image}}" class="card-img">
            <p class="lead">
                {{ $post->content }}
            </p>
        </div>
        <div class="card-footer">
            {{ $post->created_at }}
        </div>
    </div>
@stop