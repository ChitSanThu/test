{{-- @extends('layouts.master') --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Posts</h4>
                        <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="row">
                            <div class="col-12">\
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $index=> $post)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">show</a>
                                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning mx-3">edit</a>
                                            <form method="post" action="{{ route('posts.destroy',$post->id) }}" >
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
