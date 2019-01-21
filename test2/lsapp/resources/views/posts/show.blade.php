@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-info">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <br>
    <div>
        {{$post->body}}
    </div>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
    <a href="{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(["action"=>["PostsController@destroy",$post->id],"method"=>"POST","class"=>"pull right"]) !!}
        @method("delete")
        {{Form::submit("Delete",["class"=>"btn btn-danger"])}}
    {!! Form::close() !!}
    @endif
    @endif
@endsection