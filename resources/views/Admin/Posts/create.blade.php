@extends('layouts.app')

@section('content')
    <h1>Criar nova postagem</h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    @endif


{!! Form::open(['route'=>'admin.posts.store','method' => 'post']) !!}

@include('Admin.Posts._form')

    <!-- Form input -->
    <div class="form-group">
        {!! Form::label('tags', 'Tags',['class'=>'control-label']) !!}
        {!! Form::textarea('tags', null, ['class'=>'form-control']) !!}
    </div>
    
    <!-- Form input -->
    <div class="form-group">
        {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}
    </div>





{!! Form::close() !!}
   

@endsection