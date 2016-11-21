@extends('layouts.app')

@section('content')
    <h1>Blog admin</h1>

    <a href="{{route('admin.posts.create')}}" class="btn btn-success">Criar novo post</a>
    <br>
    <br>

    <table class="table">
        <th>ID</th>
        <th>Title</th>
        <th>Action</th>

        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>
                <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class="btn btn-default">Editar</a>
                <a href="{{ route('admin.posts.destroy', ['id'=>$post->id]) }}" class="btn btn-danger">Apagar</a>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $posts->render() !!}


@endsection