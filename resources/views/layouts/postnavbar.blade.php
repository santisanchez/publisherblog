<nav class="nav">
  @if(Auth::user()->role->name === 'writer')
    <a class="nav-link active btn-primary" href="{{route('posts.create')}}">Create Post</a>
  @endif  
</nav>
