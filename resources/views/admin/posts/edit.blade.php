@extends('template')

@section('title')
    Edit Post | Admin
@endsection

@section('content')

    <h1>Edit Post</h1>

    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($post, ['route'=>['admin/posts/update', $post->id], 'method'=>'put']) !!}

    @include('admin/posts/_form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::text('tags', $post->tagList, ['class' => 'form-control', 'placeholder' => 'Separe as tags por vírgula']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection