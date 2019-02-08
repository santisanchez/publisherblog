@extends('layouts.app')
@section('content')


  <div class="table-responsive">
    <table class="table">
      <thead class="bg-warning">
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
      </thead>
      <tbody>

        @foreach ($posts as $post)
          @if($loop->index === 0)
            @if(Auth::user()->role->name === 'writer' || Auth::user()->role->name === 'admin')
              <tr class="create-post clickable-row" data-href="{{route('posts.create')}}">
                <td  class=""></td>
                <td class="text-white font-weight-bold">
                Create Post
                </td>
                <td  class=""></td>
              </tr>
            @endif

          @endif
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
