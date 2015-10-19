@extends('template')

@section('title')
    Blog
@endsection

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }} <small><i>{{ $post->created_at }}</i></small></h2>
        <p>
            {{ $post->content }}
        </p>
        <div>
            <b>Tags:</b><br>
            <ul>
                @foreach($post->tags as $tag)
                    <li>
                        {{ $tag->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <b>Name: </b>{{ $comment->name }} ({{ $comment->email }})<br>
            <b>Comment: </b>{{ $comment->comment }}
        @endforeach
        <hr>
    @endforeach
@endsection