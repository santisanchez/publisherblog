@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-white bg-dark">
            <h1>{{$post->title}} by {{$post->author}}</h1>
            <h4>{{$post->content}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
