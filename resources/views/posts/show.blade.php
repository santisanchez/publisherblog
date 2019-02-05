@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{$post->title}} - {{$post->author}}</h1>
    <h2>{{$post->description}}</h2>
    <h3>{{$post->content}}</h3>
  </div>
@endsection
