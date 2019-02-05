@extends('layouts.app')
@section('content')
  @include('layouts.postnavbar')

  <div class="table-responsive">
    <table class="table">
      <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr class="clickable-row" data-href="{{ route('posts.show',$post->id) }}">
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->author}}</td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>
@endsection
