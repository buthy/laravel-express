@extends('template')

@section('title')
    Admin
@endsection

@section('content')

    <h1>Admin</h1>

    <a href="{{ route('admin/posts/create') }}" class="btn btn-success">Create new post</a>
    <br><br>

    <table class="table table-responsive table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="{{ route('admin/posts/edit', ['id' => $post->id]) }}" class="btn btn-sm btn-default">Edit</a>
                <a href="{{ route('admin/posts/destroy', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $posts->render() !!}

@endsection