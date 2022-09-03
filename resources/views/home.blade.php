@extends('layouts.master')

@section('title','Posts')
@section('content')
    <div class="row ">
        <div class="col-md-6 offset-3">
            @foreach ($posts as $post)

            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <p>{{$post->title}}</p>
                        <p>{{$post->owner->name??""}}</p>
                        <p>{{$post->time_diff}}</p>
                    </div>
                </div>
                <div class="card-body">
                    {!!$post->body!!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
