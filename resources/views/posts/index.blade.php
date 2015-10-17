@extends('template')

@section('title')
    Blog
@endsection

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }} <small><i>{{ $post->created_at }}</i></small></h2>
        <div>
            {{ $post->content }}
        </div>
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <b>Name: </b>{{ $comment->name }} ({{ $comment->email }})<br>
            <b>Comment: </b>{{ $comment->comment }}
        @endforeach
        <hr>
    @endforeach
@endsection