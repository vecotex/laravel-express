@extends('layouts.app')

@section('content')
    <h1>Editar post: {{$post->title}} </h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    @endif


{!! Form::model($post,['route'=>['admin.posts.update', $post->id],'method' => 'put']) !!}

@include ( 'Admin.Posts._form')
    <div class="form-group">
        {!! Form::label('tags', 'Tags',['class'=>'control-label']) !!}
        {!! Form::textarea('tags', $post->TagList, ['class'=>'form-control']) !!}
    </div>

    <!-- Form input -->
    <div class="form-group">
        {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}
   

@endsection